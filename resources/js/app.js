import './bootstrap';
import axios from 'axios';
window.Vue = require('vue');
Vue.config.productionTip = false;
Vue.component('chats', require('./components/Chats.vue').default);
Vue.component('chat-composer', require('./components/ChatComposer.vue').default);
Vue.component('onlineusers', require('./components/OnlineUsers.vue').default);
const app = new Vue({
    el: '#wrapper',
    data: {
        chats: '',
        onlineUsers: '',
    },
    created(){
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