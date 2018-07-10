<template>
    <div class="chat-log">

        <chat-message v-for="(message, key) in messages" :key="key" :message="message"></chat-message>

    </div>
</template>

<script>
    export default {
        name: "ChatLog",
        props: [
            'messages'
        ]
    }
</script>

<style scoped>

</style>