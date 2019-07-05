<style scoped>
    .panel-block {
        flex-direction: column;
        border: none;
    }
    .chats{
        width: 100%;
        padding: 10px;
        box-shadow: inset 0 0 20px 0 grey;
        margin-bottom:10px;
        border: 1px solid grey;
        max-height: 600px;
        overflow-x: auto
    }

    .chats .chats-right, .chats .chats-left{
        max-width: 70%;
        box-shadow: 0 0 8px 0px grey;
        padding: 8px;
        margin: 4px;
    }
    .chats-right{
        float: right;
    }

    .chats-left{
        float: left;
    }

    .no-message{
        height: 200px;
        display: flex;
        align-items: center;
    }



</style>

<template>
    <div class="panel-block">
        <div class="chats" v-if="chats.length != 0">
            <div  v-for="chat in chats" v-bind:key="chat.id" style="overflow:auto">
                <div class="chats-right" v-if="chat.user_id == userid" >
                    {{ chat.chat }}
                </div>

                <div class="chats-left" v-else >
                    {{ chat.chat }}
                </div>
            </div>
        </div>
        <div class="no-message" v-else>
            No conversation found.
        </div>

        <chat-composer v-bind:chats="chats" v-bind:userid="userid" v-bind:friendid="friendid"></chat-composer>
          
    </div>
</template>

<script>
    export default {
        props: ['chats', 'userid', 'friendid'],
       
    }
</script>
