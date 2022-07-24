<script>
export default {layout: BreezeAuthenticatedLayout }
</script>
<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import BreezeAuthenticatedLayout from '@/layouts/Authenticated.vue';

import { ref } from 'vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { ElNotification } from 'element-plus'

defineProps({
    responses: {
        type: Array,
        default: () => [],
    },
});

const addedQueries = ref([]);

const form = useForm({
    id: '',
    text: '',
    tag: ''
});

const botQueryForm = useForm({
    id: '',
    text: '',
    botResponseId: null,
});

const isEditing = ref(false);
const isQueryEditing = ref(false);
const botQueryDialog = ref(false);

const addBotQuery = () => {
    botQueryForm.post(route('manage-bot.query',
        { botResponse: botQueryForm.botResponseId }), {
        onSuccess: () => {
            addedQueries.value.push(botQueryForm.text);
            botQueryForm.reset('text');
            ElNotification.success({
                title: 'Success',
                message: usePage().props.value.flash.success,
            });
        }
    });
}

const editBotQuery = () => {
    botQueryForm.put(route('manage-bot.query.update',
        {
            botQuery: botQueryForm.id
        }), {
        onSuccess: () => {
            botQueryForm.reset();
            botQueryDialog.value = false;
            ElNotification.success({
                title: 'Success',
                message: usePage().props.value.flash.success,
            });
        }
    });
}

const addBotResponse = () => {
    form.post(route('manage-bot.response'), {
        onSuccess: () => {
            form.reset();
            ElNotification.success({
                title: 'Success',
                message: usePage().props.value.flash.success,
            });
        },
    });
}

const editBotResponse = () => {
    form.put(route('manage-bot.response', {id: form.id}), {
        onSuccess: () => {
            cancelEdit();
            ElNotification.success({
                title: 'Success',
                message: usePage().props.value.flash.success,
            });
        },
    });
}

const cancelEdit = () => {
    form.reset();
    isEditing.value = false
}

const cancelQueryEdit = () => {
    botQueryForm.reset();
    isQueryEditing.value = false;
    botQueryDialog.value = false;
}


const handleEdit = (response) => {
    form.reset();
    form.id = response.id;
    form.text = response.text;
    form.tag = response.tag;
    isEditing.value = true;
}


const handleQueryEdit = (query) => {
    botQueryForm.reset();
    botQueryForm.id = query.id;
    botQueryForm.text = query.text;
    isQueryEditing.value = true;
    openBotQueryDialog(query.bot_response_id);
}

const openBotQueryDialog = (botResponseId) => {
    botQueryForm.botResponseId = botResponseId;
    botQueryDialog.value = true;
}

const deleteResponse = (responseId) => {
    ElMessageBox.confirm(
        'Note: Deleting this bot response will also delete all queries related to it. Continue?',
        'Delete Bot Response',
        {
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            type: 'warning',
        }
    )
        .then(() => {
            form.delete(route('manage-bot.response', { botResponse: responseId }), {
                onSuccess: () => {
                    ElNotification.success({
                        title: 'Success',
                        message: usePage().props.value.flash.success,
                    });
                },
            });
        });
}

const deleteQuery = (queryId) => {
    ElMessageBox.confirm(
        'Are yo sure you want to delete this bot query?',
        'Delete Bot Query',
        {
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            type: 'warning',
        }
    )
        .then(() => {
            form.delete(route('manage-bot.query.delete',
                { botQuery: queryId }), {
                onSuccess: () => {
                    ElNotification.success({
                        title: 'Success',
                        message: usePage().props.value.flash.success,
                    });
                },
            });
        });
}
</script>

<template>
  <Head title="Manage Bot" />
  <el-dialog
    v-model="botQueryDialog"
    title="Bot Query"
    width="50%"
  >
    <form class="grid grid-cols-5 gap-4 mb-3" @submit.prevent="isQueryEditing ? editBotQuery() : addBotQuery()">
        <el-input class="col-span-4" placeholder="Type in Bot Query" v-model="botQueryForm.text" required></el-input>
        <div class="flex">
            <el-button type="warning" class="flex-1" native-type="submit">{{ isQueryEditing ? 'Update' : 'Add' }}</el-button>
            <el-button type="default" class="flex-shrink-1 ml-1" native-type="button" @click="cancelQueryEdit()" v-if="isQueryEditing">x</el-button>
        </div>
    </form>
    <p class="text-green-500" v-for="addedQuery in addedQueries" :key="addedQuery">{{ addedQuery }} Added!</p>
  </el-dialog>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200 g-3">
                <div class="flex justify-between p-3 border-b">
                    <h4 class="text-lg font-medium leading-6 text-gray-900">
                        Bot Management
                    </h4>
                </div>
                <form class="grid grid-cols-5 gap-4 p-3 border-b" @submit.prevent="isEditing ? editBotResponse() : addBotResponse()">
                    <el-input class="col-span-3" placeholder="Type in Bot Response" v-model="form.text" required></el-input>
                    <el-input placeholder="Tag" v-model="form.tag"></el-input>
                    <div class="flex">
                        <el-button type="primary" class="flex-1">{{ isEditing ? 'Update' : 'Add' }}</el-button>
                        <el-button type="default" class="flex-shrink-1 ml-1" native-type="button" @click="cancelEdit()" v-if="isEditing">x</el-button>
                    </div>
                </form>
                <div>
                    <el-table :data="responses" style="width: 100%">
                    <el-table-column type="expand">
                        <template #default="props">
                            <div class="px-10">
                                <el-table :data="props.row.queries">
                                    <el-table-column label="Bot Queries" prop="text" />
                                    <el-table-column label="Action">
                                        <template #default="scope">
                                            <el-button size="small" type="warning" @click="handleQueryEdit(scope.row)"
                                            >Edit Query</el-button>
                                            <el-button size="small" type="danger" @click="deleteQuery(scope.row.id)"
                                            >Delete</el-button>
                                        </template>
                                    </el-table-column>
                                </el-table>
                            </div>
                        </template>
                        </el-table-column>
                        <el-table-column label="Response" prop="text" />
                        <el-table-column label="Tag" prop="tag" />
                        <el-table-column label="Action">
                            <template #default="scope">
                                <el-button size="small" type="warning" @click="openBotQueryDialog(scope.row.id)"
                                >Add Bot Query</el-button>
                                <el-button size="small" @click="handleEdit(scope.row)"
                                >Edit</el-button>
                                <el-button size="small" type="danger" @click="deleteResponse(scope.row.id)"
                                >Delete</el-button>
                            </template>
                        </el-table-column>
                    </el-table>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>
