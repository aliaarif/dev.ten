import './bootstrap';
import axios from 'axios';
window.Vue = require('vue');
Vue.config.productionTip = false;
Vue.component('chats', require('./components/Chats.vue').default);
const app = new Vue({
    el: '#wrapper',
    data: {
        chats: '',
    },
    created(){
        const userId = $('meta[name="userId"]').attr('content');
        const friendId = $('meta[name="friendId"]').attr('content');
        
        if(friendId != undefined){
    axios.post('/chats/get-chats/' + friendId)
            .then((res) => {
                console.log(res);
                this.chats = res.data;
            });
        }
    },
})