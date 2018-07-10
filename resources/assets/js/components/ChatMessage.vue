<template>
    <div class="chat-message py-2">
        <div>"{{ message.text }}"</div>
        Author: <i>{{ message.user.name }}</i>
    </div>
</template>

<script>
    export default {
        name: "ChatMessage",
        props:[
            'message'
        ]
    }
</script>

<style scoped>

</style>