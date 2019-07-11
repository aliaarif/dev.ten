<template>
	<ul>		
		<li v-for="(chatMessage, index) in messages" style="text-align:center;">
			<span v-if="index != 'Today'">
				<span v-if="index == 'chatYesterday'">Yesterday</span>
				<span v-else-if="index == 'chatToday'">Today</span>
				<span v-else>{{index}}</span>
			</span>
			<ul>
				<li style="width:100%" v-for="message in chatMessage"
				:key="message.id" :class="{'currentUser': senderUser.id == message.sender }"
				>
				<div v-if="senderUser.id == message.sender">
					<div class="msj-rta macroRight">
						<div class="text text-r">
							<p>{{ message.message }}</p>
							<p style="text-align: right;"><small>{{ message.chat_time }}</small></p>
						</div>
					</div>
				</div>
				<div v-else>
					<div class="msj macroLeft">
						<div class="text text-l">
							<p> {{ message.message }} </p>
							<p><small>{{ message.chat_time }}</small></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</li>
</ul>
</div>
</template>

<script>
export default {
	props: ['messages','senderUser','chatYesterday','chatToday'],
	

}
</script>

<style scoped>


.frame .author-thumb {
	height: 36px;
	width: 36px;
}

.notification-list .author-thumb {
	height: 40px;
	width: 40px;
}
.frame li>* {
	vertical-align: top;
}

.author-thumb {
	display: inline-block;
	position: relative;
}

.mytext{
	border:0;padding:10px;background:whitesmoke;
}
.text{
	width:100%;display:flex;flex-direction:column;
}
.text > p:first-of-type{
	width:100%;margin: 0;padding: 0px;margin-bottom:auto;line-height: 17px;font-size: 14px;text-align: justify;
}
.text > p:last-of-type{
	width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto; text-align: justify;
}
.text-l{
	float:left;padding:10px;
}        
.text-r{
	float:right;padding:10px;text-align: right;
}
.avatar{
	display:flex;
	justify-content:center;
	align-items:center;
	width:8%;
	float:left;
	padding-right:10px;
}
.macroRight{
	margin-top:12px;width:auto;max-width: 80%;    
	border-top-right-radius: 17px;
	border-top-left-radius: 13px;
	border-bottom-right-radius: 0px;
	border-bottom-left-radius: 17px; padding:5px;display:flex;
}


.macroLeft{
	margin-top:12px;
	width:auto;max-width: 80%;    
	border-top-right-radius: 13px;
	border-top-left-radius: 17px;
	border-bottom-right-radius: 17px;
	border-bottom-left-radius: 0px; padding:5px;display:flex;
}



.msj-rta{
	float:right;background: #edf2f6;
	color: #888da8;
}
.msj{
	float:left;background:#fff;
}
.msj-rta small{
	color:silver;
}
.frame{
	background:#e0e0de;
	height:343px;
	overflow:hidden;
	padding:0;
}
.frame > div:last-of-type{
	position:absolute;bottom:0;width:100%;display:flex;
}
body > div > div > div:nth-child(2) > span{
	background: whitesmoke;padding: 10px;font-size: 21px;border-radius: 50%;
}
body > div > div > div.msj-rta.macro{
	margin:auto;margin-left:1%;
}
ul {
	width:100%;
	list-style-type: none;
	padding:18px;
	position:relative;
	bottom:47px;
	display:flex;
	flex-direction: column;
	top:0;
}



</style>