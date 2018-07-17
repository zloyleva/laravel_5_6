<template>
    <div class="chat-log">

        <chat-message v-for="(message, key) in messages" :key="key" :message="message"></chat-message>

    </div>
</template>

<script>
    const allowedOrigins = "*:* ";

    const socket = io('http://localhost:3000',{origins:allowedOrigins});
    export default {
        name: "ChatLog",
        props: [
            'messages'
        ],
        created(){
            socket.on('general-chanel:UserSendMessage', (data) => {
                console.log(data);
                this.messages.push(data);
            })
        }
    }
</script>

<style scoped>

</style>