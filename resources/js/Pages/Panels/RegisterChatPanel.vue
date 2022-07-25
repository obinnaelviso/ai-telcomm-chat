<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import BotBubble from '@/Components/BotBubble.vue';

const form = useForm({
    name: '',
    email: '',
    tag: ''
});

const registerChat = () => {
    form.post(route('chat.register'));
}
</script>

<template>
<div class="flex-1 flex overflow-y-auto p-5">
    <BotBubble>
        Hi, I am Jukabot. I am your virtual telecom assistant.
        <br />
        Fill in the form below to continue.

        <form class="grid gap-3 mt-3" @submit.prevent="registerChat">
            <el-input placeholder="Your full name" v-model="form.name"></el-input>
            <el-input placeholder="Your email address" v-model="form.email"></el-input>
            <div>
                <el-select v-model="form.tag" placeholder="Select Network Type">
                    <el-option label="MTN" value="mtn"></el-option>
                    <el-option label="AIRTEL" value="airtel"></el-option>
                    <el-option label="GLO" value="glo"></el-option>
                    <el-option label="9MOBILE" value="9mobile"></el-option>
                </el-select>
            </div>
            <el-button native-type="submit" type="primary">Submit</el-button>
        </form>
    </BotBubble>
</div>
</template>