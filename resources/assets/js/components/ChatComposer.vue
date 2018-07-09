<template>
    <div class="chat-composer">
        <form @submit.prevent="submitForm">
            <div class="form-row align-items-center">
                <div class="col-10">
                    <input type="text" class="form-control mb-2" v-model="message_text" placeholder="Type your text here...">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary mb-2">Send</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "ChatComposer",
        data(){
            return {
                message_text: ''
            }
        },
        methods:{
            submitForm(e){
                this.$emit('sendMessage', {text: this.message_text, author: 'Zloy Leva'})
                this.message_text = '';
            }
        }
    }
</script>

<style scoped>

</style>