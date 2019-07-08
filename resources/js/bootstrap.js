

import axios from 'axios';
import Vue from 'vue';
import io from 'socket.io-client';

window.axios = axios;
window.Vue = Vue;
window.io = io;

const instance = axios.create({
	baseURL: 'http://dev.ten/'
});

window._ = require('lodash');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
	window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
	console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


import Echo from 'laravel-echo'

window.Pusher = require('pusher-js');

window.Echo = new Echo({
	broadcaster: 'pusher',
	key: process.env.MIX_PUSHER_APP_KEY,
	cluster: process.env.MIX_PUSHER_APP_CLUSTER
    //encrypted: true

});
