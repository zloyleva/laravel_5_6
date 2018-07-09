<template>
    <div class="chat-main-component">
        <chat-log :messages="messages"></chat-log>
        <chat-composer @sendMessage="addNewMessage"></chat-composer>
    </div>
</template>

<script>
    export default {
        name: "MainChatComponenet",
        data(){
            return {
                messages: [
                    {text: "Some  text message", author: "Zloy Leva",},
                    {text: "Next text message", author: "Oleh",},
                ]
            }
        },
        methods:{
            addNewMessage(message){
                console.log(message);
                this.messages.push(message)
            }
        }
    }
</script>

<style scoped>

</style>