import './bootstrap';
window.Vue = require('vue');


Vue.config.productionTip = false;
Vue.component('chats', require('./components/Chats.vue').default);
Vue.component('chat-composer', require('./components/ChatComposer.vue').default);
Vue.component('onlineusers', require('./components/OnlineUsers.vue').default);




//Vue.component('vue-chat', require('./components/VueChat.vue').default);
//Vue.component('vue-chat-channels', require('./components/VueChatChannels.vue').default);
//Vue.component('vue-chat-messages', require('./components/VueChatMessages.vue').default);
//Vue.component('vue-chat-new-message', require('./components/VueChatNewMessage.vue').default);
//Vue.component('vue-chat-participants', require('./components/VueChatParticipants.vue').default);
//Vue.component('vue-header-notifications', require('./components/VueHeaderNotifications.vue'));
//Vue.component('vue-all-messages', require('./components/VueAllMessages.vue').default);


//const app = new Vue({ el: '#wrapper' });

const app = new Vue({
    el: '#wrapper',
    data: {
        chats: '',
        onlineUsers: '',
    },
    methods: {
        scrollToEnd: function(){
            var container = document.querySelector('.chats');
            var scrollHeight = container.scrollHeight();
            container.scrollTop = scrollHeight;
        }
    },
    created(){
        //this.scrollToEnd();

        const userId = $('meta[name="userId"]').attr('content');
        const friendId = $('meta[name="friendId"]').attr('content');

        if(friendId != undefined){
            axios.post('/chats/get-chats/' + friendId)
            .then((res) => {
                //console.log(res);
                this.chats = res.data;
            });

            window.Echo.private('Chat.' + friendId + '.' + userId)
            .listen('BroadcastChat', (e) => {
                document.getElementById('chatAudio').play();
                this.chats.push(e.chat);
                this.scrollToEnd();

            });
        }


        if(userId != 'null'){
            window.Echo.join('Online')
            .here((users) => {
                this.onlineUsers = users;
            })
            .joining((user) => {
                this.onlineUsers.push(user);
            })
            .leaving((user) => {
                this.onlineUsers = this.onlineUsers.filter((u) => {
                    u != user;
                });
            })
        }
    },
})