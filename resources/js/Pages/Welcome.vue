<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import BotBubble from '@/Components/BotBubble.vue';
import SenderBubble from '@/Components/SenderBubble.vue';
</script>

<template>
  <Head title="Welcome to our network support" />

  <div class="bg-gray-100 h-screen">
      <div class="flex flex-col h-screen mx-40 p-5 bg-white rounded">
        <div class="w-full border-b pb-2 flex">
            <div class="rounded-full overflow-hidden w-20 h-20 ring-2 ring-white bg-blue-400 mr-5">
                <img src="../../images/chatbot-female.jpg" alt="chatbot-female">
            </div>
            <div class="my-5 text-lg font-bold">Virtual Telecomm Assistant</div>
        </div>
        <!-- Chat space -->
        <div class="flex-1 flex flex-col-reverse overflow-y-auto p-5">
            <!-- Sender -->
            <SenderBubble>Hi</SenderBubble>
            <!-- Receiver -->
            <BotBubble>
                Hi, my name is Juka, I'm your virtual telecom assistant. Please fill in your details below to continue: 

                
            </BotBubble>
        </div>
        <!-- Chat input -->
        <form class="flex justify-center">
            <input type="text" class="bg-gray-200 rounded-lg p-2 flex-1 mr-4 focus:bg-gray-50" placeholder="Type here...">
            <button class="bg-indigo-500 px-6 py-2 rounded-md text-white">Send</button>
        </form>
      </div>
  </div>
</template>
