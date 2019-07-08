<template>
    <div class="message-input-wrapper">
        <form>
            <div class="form-group label-floating is-empty">
                <label class="control-label">Write your reply here...</label>
                <textarea class="form-control" placeholder=""  v-model="message" @keyup.enter.prevent="sendMessage" ></textarea>
            </div>
            <div class="add-options-message">
                <button class="btn btn-primary btn-sm" @click="sendMessage">Post Reply</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['activeChannel', 'username'],    
    data() {
        return {
            message: '',
        };
    },

    methods: {
        sendMessage() {
            let endpoint = `/users/${this.activeChannel}/messages`;
            let data = {
                username: this.username.id,
                authUser: this.username.name,
                message: this.message
            };

            axios.post(endpoint, data);
            this.message = '';
        }
    }
}
</script>

<style>

</style>