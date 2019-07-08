<template>
	<div class="control-icon more has-items">
		<svg class="olymp-happy-face-icon"><use xlink:href="/lh-html/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
		<div class="label-avatar bg-primary pendingFreindRequests" v-if="totalMessages">{{ totalMessages }}</div>
		<div class="more-dropdown more-with-triangle triangle-top-center">
			<div class="ui-block-title ui-block-title-small">
				<h6 class="">Notification</h6>
			</div>
			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<ul class="mCustomScrollbar notification-list friend-requests">			
					<li v-if="lhMessages">						
						<div class="notification-event" style="width: 100%;">
							<a :href="'/messages-from-super-admin'" class="h6 notification-friend" style="display: inline;font-weight: 800;">{{ lhMessages }}
								<span style="font-size: .875rem;font-weight: 400;
								line-height: 1.3;
								color: #515365;"> New Messages from LINKINGHUTS</span></a> 
							</div>
						</li>
						<li v-if="nbhrMessages">						
							<div class="notification-event" style="width: 100%;">
								<a :href="'/docs'" class="h6 notification-friend" style="display: inline;font-weight: 800;">{{ nbhrMessages }}
									<span style="font-size: .875rem;font-weight: 400;
									line-height: 1.3;
									color: #515365;"> New Notices on your Neighbourhood Notice Board</span></a> 
								</div>
							</li>
							<li v-if="openEvents">						
								<div class="notification-event" style="width: 100%;">
									<a :href="'/events'" class="h6 notification-friend" style="display: inline;font-weight: 800;">{{ openEvents }}
										<span style="font-size: .875rem;font-weight: 400;
										line-height: 1.3;
										color: #515365;"> Open Events in your city</span></a> 
									</div>
								</li>
								<li v-if="openPolls">						
									<div class="notification-event" style="width: 100%;">
										<a :href="'/polls/intra-neighbourhood/'" class="h6 notification-friend" style="display: inline;font-weight: 800;">{{ openPolls }}
											<span style="font-size: .875rem;font-weight: 400;
											line-height: 1.3;
											color: #515365;"> Open Polls in your Neighbourhood</span></a> 
										</div>
									</li>
								</ul>					
							</div>
						</div>
					</div>
				</template>

				<script>
				export default {
					props: ['authUser'],		
					data(){
						return {			
							totalMessages:0,
							lhMessages:0,
							nbhrMessages:0,
							openEvents:0,
							openPolls:0,
						}
					},
					methods: {
						reset() {
							Object.assign(this.$data, this.$options.data.call(this));
						},
						getAllMessages() {
							this.reset();
							let endPoint = '/user-axios/all-messages';
							axios
							.get(endPoint)
							.then(res=>{
								this.lhMessages = res.data.lh;
								this.nbhrMessages = res.data.nbhr;
								this.openEvents = res.data.oe;
								this.openPolls = res.data.op;
								this.totalMessages = res.data.tr;
							}).catch(error=>{
								console.log(error);
							});
						},
					},	
					created() {			
						this.getAllMessages();
					},
				}
				</script>
