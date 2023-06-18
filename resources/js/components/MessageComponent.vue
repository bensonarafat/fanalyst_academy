<template>
    <div class="col-xl-8 col-lg-7 col-md-12">
        <div class="chatbox_right">
            <div class="chat_header">
                <div class="user-status">
                    <div class="user-avatar">
                        <img v-if="currentRoom.user.photo == null" src="assets/images/left-imgs/img-1.jpg" alt="" />
                        <img v-if="currentRoom.user.photo != null" :src=currentRoom.user.photo alt="" />
                    </div>
                    <p class="user-status-title"><span class="bold">{{ currentRoom.user.fullname }}</span></p>
                    <p class="user-status-tag online">{{ currentRoom.user.type }}</p>
                </div>
            </div>
            <div class="messages-line simplebar-content-wrapper2 scrollstyle_4" id="scrollBottom">
                <div class="mCustomScrollbar">

                    <div :class="['main-message-box', message.sender_id == userId ? 'ta-right ta-right-custom' : 'st3']" v-for="message in messages" :key="message.id">
                        <div :class="['message-dt',  message.sender_id == userId ? 'message-dt-custom' :'st3']">
                            <div class="message-inner-dt">
                                <p>{{ message.message }}</p>
                            </div>
                            <span :class="[ message.sender_id == userId ? 'message-date-custom' :'' ]">{{ message.created_at }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="message-send-area">
                <div class="mf-field">
                    <div class="ui search focus input__msg">
                        <div class="ui left icon input swdh19">
                            <input class="prompt srch_explore" type="text" id="chat-widget-message-text-2" name="chat_widget_message_text_2" placeholder="Write a message..." @keyup.enter="sendMessage()" v-model="message"/>
                        </div>
                    </div>
                    <button v-on:click="sendMessage()" class="add_msg" type="button"><i class="uil uil-message"></i></button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"MessageComponent",
    props: ["messages", "currentRoom"],
    data(){
        return {
            message: '',
            user_id: this.userId,
        }
    },
    created(){

    },
    methods: {
    scrollToEnd() {
      var container = this.$el.querySelector("#scrollBottom");
      container.scrollTop = container.scrollHeight + 999999;
    },
        async sendMessage() {

            try {
                if( this.message == ''){
                    return;
                }
                const response = await axios.post("messages/chat-message", {
                    "receiver_id": this.currentRoom.user.id ,
                    "message": this.message
                });
                if(response.status){
                    this.message= '';
                    this.$emit("messagesent");
                    this.scrollToEnd();
                }
            } catch (_) {
                alert("Oops, there was an error");

            }
        }
    }
}
</script>
