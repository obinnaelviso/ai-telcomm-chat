<script setup>
</script>

<template>
    <div class="flex flex-wrap">
        <div class="rounded-full overflow-hidden w-20 h-20 ring-2 ring-white bg-blue-400 mr-3 mb-5">
            <img src="../../images/chatbot-female.jpg" alt="chatbot-female">
        </div>
        <div>
            <div class="min-w-[10px] max-w-lg shadow bg-yellow-200 my-3 rounded-b-lg rounded-tr-lg p-3">
                <slot />
            </div>
        </div>
    </div>
</template>
