<template>
    
</template>

<script>
    import  store from '../../store/store'
    export default {
        name: "LogoutComponent",
        mounted(){
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            store.commit('logoutUser');
            this.$router.push({name: 'home'});
        }
    }
</script>

<style scoped>

</style>