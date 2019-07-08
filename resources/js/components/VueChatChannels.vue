<template>
	<ul class="notification-list chat-message">		
		<li v-for="user in users"
		:key="user.senders.id" :class="{ 'message-unread': user.chat_id == activeChannel }"
		@click="setChannel(user.chat_id)" v-if="user.senders.id != senderUser.id">		
		<div class="author-thumb">
			<img :src="'../../'+user.senders.avatar" alt="author" width="30">
		</div>
		<div class="notification-event" :class="{ 'unreadAble': user.m_read == 0 }" :id="user.chat_id">
			<a href="#" class="h6 notification-friend">{{user.senders.name}}</a>
			<span class="chat-message-item" v-if="user.messaging.message.length >= 50">{{user.message.substring(0,50)+"..."}}</span>
			<span class="chat-message-item" v-else>{{user.message}}</span>
			<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">{{user.full_date_time}}</time></span>
		</div>
	</li>
	<li :key="user.recievers.id" :class="{ 'message-unread': user.chat_id == activeChannel }"
	@click="setChannel(user.chat_id)" v-else>

	<div class="author-thumb">
		<img :src="'../../'+user.recievers.avatar" alt="author" width="30">
	</div>
	<div class="notification-event">
		<a href="#" class="h6 notification-friend">{{user.recievers.name}}</a>
		<span class="chat-message-item" v-if="user.messaging.message.length >= 50">{{user.message.substring(0,50)+"..."}}</span>
		<span class="chat-message-item" v-else>{{user.message}}</span>
		<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">{{user.full_date_time}}</time></span>
	</div>
</li>
</ul>
</template>

<script>
export default {
	props: ['users', 'activeChannel','senderUser','unreadMessage'],
	
	methods: {
		setChannel(id) {
			this.$emit('channelChanged', id);
			$('#'+id).removeClass('unreadAble');

		}
	}
}
</script>

<style scoped>
.column {
	border-right: 2px dotted greenyellow;
}
.unreadAble a{
	font-weight: bold;
	font-size: 13px;
	color: #616069;
}
.unreadAble{
	font-weight: bold;
	font-size: 13px;
	color: #888da8;
}
.channel {
	cursor: pointer;
}

.channel.active {
	background: #666;
}
</style>