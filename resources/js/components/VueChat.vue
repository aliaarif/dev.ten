<template>
	<div class="col-xl-12 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-xs-12">
		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">Chat / Messages</h6>				
			</div>

			<div class="row">
				<div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12 padding-r-0 frame" data-mcs-theme="dark">
					<vue-chat-channels :users="users"
					:active-channel="activeChannel" :senderUser="authUser"
					@channelChanged="onChannelChanged"></vue-chat-channels>
				</div>

				<div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-xs-12 padding-l-0">
					<!-- Chat Field -->
					<div class="chat-field">
						<!--<div class="ui-block-title">
							 <h6 class="title">
								<vue-chat-participants :participants="participants"></vue-chat-participants>
							</h6> 
						</div>-->
						<div class="frame" style="background: #fafafa;" data-mcs-theme="dark" ref="message-window">
							<vue-chat-messages :messages="messages" :senderUser="authUser" :chatToday="today" :chatYesterday="yesterday"></vue-chat-messages>

						</div>							
						<!-- <vue-chat-new-message :active-channel="activeChannel"
							:username="authUser"></vue-chat-new-message> -->


							<div class="message-input-wrapper">
								<form>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Write your reply here...</label>
										<textarea class="form-control" placeholder=""  v-model="message" @keyup.enter.prevent="sendMessage" ></textarea>
									</div>
									<div class="add-options-message">
										<button type="button" class="btn btn-primary btn-sm" @click="sendMessage">Post Reply</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</template>

	<script>
	export default {
		props: ['users', 'authUser','today','yesterday'],
		
		data() {		
			return {
				activeChannel: this.users[0].chat_id,			
				messages: [],
				username: this.users[0].chat_id,
				participants: [],
				message: '',
			};
		},

		mounted() {
			this.scrollToBottom();
		},

		watch: {
			messages() {
				this.scrollToBottom();
			}
		},
		methods: {
			fetchMessages() {
				let endpoint = `/users/${this.activeChannel}/messages`;
				axios.get(endpoint)
				.then(({ data }) => {
					this.messages = data;
				});

				let readmessage = `/read/${this.activeChannel}/messages`;
				let data = {
					username: this.authUser.id,
					authUser: this.authUser.name,
					message: this.message
				};
				axios.post(readmessage);

			},
			onChannelChanged(id) {
				this.activeChannel = id;
				this.fetchMessages();
			},

			scrollToBottom() {
				this.$nextTick(() => {
					this.$refs['message-window'].scrollTop = this.$refs['message-window'].scrollHeight;
				});
			},

			sendMessage() {
				let endpoint = `/users/${this.activeChannel}/messages`;
				let data = {
					username: this.authUser.id,
					authUser: this.authUser.name,
					message: this.message
				};
				axios.post(endpoint, data);
				this.message = '';
				this.scrollToBottom();
			}
		},
		created() {
			this.fetchMessages();
			this.socket = io(`http://142.93.216.22:3000?username=${this.username}`);

			for (let channel of this.users) {				
				this.socket.on(`${channel.chat_id}:App\\Events\\MessageSent`, data => {		
					if (this.activeChannel == channel.chat_id) {
						this.messages.Today.push(data.data);
					}			
				});
			}	
			this.scrollToBottom();
		},
	}
	</script>

	<style>
	.mCustomScrollbar {
		overflow: hidden;
		max-height: 344px;
	}
	.frame{
		max-height: 343px;
		overflow: hidden;
		overflow-y: scroll;
	}

	.chat-field .mCustomScrollbar {
		overflow: hidden;
		max-height: 450px;
		background: #fafafa;
	}

	</style>