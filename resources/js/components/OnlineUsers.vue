<template>
    <div class="is-pulled-right">
        <i class="fa fa-circle green" v-if="checkUserOnlineStatus()"></i>
        <i class="fa fa-circle red" v-else></i>
    </div>    
</template>

<script>
export default {
    props: ['friend', 'onlineusers'],
    methods: {
        checkUserOnlineStatus: function(){
            return _.find(this.onlineusers, {id: this.friend.id});
        }
    }
    
    
}
</script>

<style scoped>
.red{
    color: red;
}

.green{
    color: green;
}
</style>
