<script setup>
import { Head, usePage } from '@inertiajs/inertia-vue3';
import RegisterChatPanel from './Panels/RegisterChatPanel.vue';
import ChatPanel from './Panels/ChatPanel.vue';
import { ElNotification } from 'element-plus';
import { ref, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
    conversation: {
        type: Object,
        default: () => ({}),
    }
});

const messages = ref([]);
const chatLoading = ref(false);
const messageLoading = ref(false);
const text = ref('');
const isChatAvailable = ref(false);

const registered = () => {
    let success = usePage().props.value.flash.success;
    isChatAvailable.value = true;
    if (success) {
        ElNotification.success({
            title: 'Success',
            message: usePage().props.value.flash.success,
        });
    }
    getMessages();
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

const endChat = async () => {
    chatLoading.value = true;
    await axios.post(route('chat.end'))
        .then(response => {
            appendMessages(response.data.data);
            isChatAvailable.value = false;
            ElNotification.success({
                title: 'Success',
                message: response.data.message,
            });
        }).catch(error => {
            ElNotification.error({
                title: 'Error',
                message: error.response.data.message,
            });
        }).finally(() => {
            chatLoading.value = false;
        });
}

const getMessages = async () => {
    chatLoading.value = true;
    await axios.get(route('chat.messages'))
        .then(response => {
            if (response.data.length === 0) {
                return Inertia.get(route('chat.index'));
            }
            messages.value = response.data;
        }).catch(error => {
            ElNotification.error({
                title: 'Error',
                message: error.response.data.message,
            });
        }).finally(() => {
            chatLoading.value = false;
        });
}

const appendMessages = async (data) => {
    for (let i = 0; i < data.length; i++) {
        let message = data[i];
        // using unshift instead of push because the flex is upside down
        messages.value.unshift(message);
        if (message.client_id != null) {
            await sleep(2000);
        }
    }
}

const sendMessage = async () => {
    messageLoading.value = true;
    let message = text.value;
    text.value = "";
    if (props.conversation == null) {
        ElNotification.warning({
            message: 'Please fill in your details in the form below to start conversation',
        });
    }
    await axios.post(route('chat.message'), {
        clientId: props.conversation.client_id,
        message: message
    }).then(response => {
        if (response.data.length === 0) {
            return Inertia.get(route('chat.index'));
        }
        appendMessages(response.data.data);
    }).catch(error => {
        ElNotification.error({
            title: 'Error',
            message: error.response.data.message,
        });
    }).finally(() => {
        messageLoading.value = false;
    });
}

onMounted(async () => {
    if (props.conversation != null) {
        await getMessages();
    }
});
</script>

<template>
  <Head title="Welcome to our network support" />

  <div class="bg-gray-100 h-screen">
      <div class="flex flex-col h-screen mx-40 p-5 bg-white rounded">
        <div class="w-full border-b pb-2 flex justify-between">
            <div class="flex">
                <div class="rounded-full overflow-hidden w-20 h-20 ring-2 ring-white bg-blue-400 mr-5">
                    <img src="../../images/chatbot-female.jpg" alt="chatbot-female">
                </div>
                <div class="my-5 text-lg font-bold">Virtual Telecomm Assistant</div>
            </div>
            <el-button type="danger" size="large" @click="endChat" v-if="isChatAvailable">End Chat</el-button>
        </div>
        <!-- Chat space -->
        <div class="flex-1 flex flex-col-reverse overflow-y-auto p-5">
            <RegisterChatPanel v-if="conversation == null" />
            <ChatPanel :conversation-id="conversation.id" :messages="messages" @registered="registered" v-else />
        </div>
        <!-- Chat input -->
        <form class="flex justify-center" @submit.prevent="sendMessage">
            <input type="text" class="bg-gray-200 rounded-lg p-2 flex-1 mr-4 focus:bg-gray-50" v-model="text" placeholder="Type your message here..." :disabled="conversation === null">
            <button class="bg-indigo-500 px-6 py-2 rounded-md text-white" :disabled="conversation === null">Send</button>
        </form>
      </div>
  </div>
</template>
