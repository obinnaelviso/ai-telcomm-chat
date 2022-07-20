<script setup>
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
  <Head title="Dashboard" />

  <div class="bg-gray-100 h-screen">
      <div class="flex flex-col h-screen mx-40 p-5 bg-white rounded">
        <div class="w-full border-b pb-2 flex">
            <div class="rounded-full overflow-hidden w-20 h-20 ring-2 ring-white bg-blue-400 mr-5">
                <img src="../../images/chatbot-female.jpg" alt="chatbot-female">
            </div>
            <div class="my-5 text-lg font-bold">Virtual Telecomm AI</div>
        </div>
        <!-- Chat space -->
        <div class="flex-1 flex flex-col-reverse overflow-y-auto">
            <!-- Sender -->
            <div class="flex flex-wrap">
                <div class="rounded-full overflow-hidden w-20 h-20 ring-2 ring-white bg-blue-400 mr-3 mb-5">
                    <img src="../../images/chatbot-female.jpg" alt="chatbot-female">
                </div>
                <div class="min-w-[10px] max-w-lg shadow bg-yellow-300 my-3 rounded-b-lg rounded-tr-lg p-3 min-h-[10px]">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam maiores nisi quam repudiandae consequatur, maxime facere aliquid assumenda ex ipsum veniam libero impedit nobis. Veritatis officiis eligendi ea corporis temporibus error quis vero nostrum id adipisci ut repellat officia itaque, pariatur at nobis voluptas vitae cumque. Sint nobis quod tempora.
                    <!-- Lorem. -->
                </div>
            </div>
            <!-- Receiver -->
            <div class="flex self-end">
                <div class="min-w-[10px] max-w-lg shadow bg-red-300 my-3 rounded-b-lg rounded-tl-lg p-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, eligendi!
                </div>
            </div>
        </div>
        <!-- Chat input -->
        <form class="flex justify-center">
            <input type="text" class="bg-gray-200 rounded-lg p-2 flex-1 mr-4 focus:bg-gray-50" placeholder="Type here...">
            <button class="bg-indigo-500 px-6 py-2 rounded-md text-white">Send</button>
        </form>
      </div>
  </div>
</template>
