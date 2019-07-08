<style scoped>
    .panel-block {
        flex-direction: row;
        width: 100%;
        border: none;
        padding: 0;
    }

    input {
        border-radius: 0;
    }

    .auto-width{
        width: auto;
    }

</style>

<template>
    <div class="panel-block field">
        <div class="control">
            <input type="text" class="input" v-model="chat" v-on:keyup.enter="sendChat">
        </div> 
        <div class="control auto-width">
            <input type="button" class="button" value="Send" v-on:click="sendChat">
        </div>  
    </div>
</template>

<script>
    export default {
        props: ['chats', 'userid', 'friendid'],
       data(){
           return {
               chat: '',
           }
       },
        created(){
            //document.getElementById('chats').scrollHeight = 200;
        //     var height=document.querySelector('.chats').scrollHeight;


        
        // document.querySelector('.chats').scrollTop = height;
        // document.querySelector('.chats').scrollTop = height + 50;
        // console.log(height + 50);
        },
    
       methods: {
           sendChat: function(e){
               if(this.chat != ''){
                   var data = {
                       chat: this.chat,
                       friend_id: this.friendid,
                       user_id: this.userid,
                   };

                   this.chat = '';

                   axios.post('/chats/send-chat', data)
                   .then((res) => {


var height=document.querySelector('.chats').scrollHeight;
            document.querySelector('.chats').scrollTop = height;
            document.querySelector('.chats').scrollTop = height + 50;
            
                    this.chats.push(data);

                    // let container = document.querySelector('.chats');
                    // if(container.scrollHeight != null){
                    // let scrollHeight = container.scrollHeight;
                    // console.log(scrollHeight);
                    // container.scrollTop = scrollHeight + 50;
                    // }



            


                    

                       
                       
                   });
               }
           },


          
            scrollToEnd: function(){
                var container = document.querySelector('.chats');
                var scrollHeight = container.scrollHeight();
                container.scrollTop = scrollHeight;
            },
        


       },
       
    }
</script>
