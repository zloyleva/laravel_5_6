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
                messages: []
            }
        },
        created(){
            axios.get('/messages').then(responce => {
                console.log(responce)
                this.messages = responce.data;
            });
        },
        methods:{
            addNewMessage(message){
                console.log(message);
                // this.messages.push(message);
                axios.post('/messages/store', message).then(responce => {
                    console.log(responce)
                });
            }
        }
    }
</script>

<style scoped>

</style>