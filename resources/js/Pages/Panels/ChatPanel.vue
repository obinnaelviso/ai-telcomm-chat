<script setup>
import SenderBubble from '@/Components/SenderBubble.vue';
import BotBubble from '@/Components/BotBubble.vue';
import { onMounted } from 'vue';

defineProps({
    conversationId: {
        type: Number,
        default: null,
    },
    messages: {
        type: Array,
        default: () => [],
    },
})

const emit = defineEmits(['registered']);

onMounted(() => {
    emit('registered');
})
</script>

<template>
    <template  v-for="message in messages" :key="message">
        <SenderBubble v-if="message.client_id">
            {{ message.message }}
        </SenderBubble>
        <!-- Receiver -->
        <BotBubble v-else>
            {{ message.message }}
        </BotBubble>
    </template>
</template>