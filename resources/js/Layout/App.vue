<template>
    <div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-comments"></i> Messages</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="all_msg_bg">

                        <div class="row no-gutters" v-if="conversations.length>0">
                            <ConversationComponeent :conversations="conversations" :currentRoom="currentRoom"/>
                            <MessageComponent
                            :messages="messages"
                            :currentRoom="currentRoom"
                            v-on:messagesent="getMessages()"/>
                        </div>
                        <div v-else class="row justify-content-xl-center justify-content-lg-center justify-content-md-center">
                            <div class="col-xl-6 col-lg-8 col-md-8">
                                <div class="verification_content">
                                    <h4>Conversation</h4>
                                    <p>You have no active conversation yet. Click on instructor page to start a conversation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <FooterComponent/>
</div>
</template>
<script>
import FooterComponent from '../components/FooterComponent.vue';
import ConversationComponeent from '../components/ConversationComponent.vue'
import MessageComponent from '../components/MessageComponent.vue'
import axios from 'axios';

export default {
    name:"App",
    components: {
        FooterComponent,
        ConversationComponeent,
        MessageComponent
    },
    data(){
        return {
            conversations: [],
            currentRoom: [],
            messages: [],
        }
    } ,
    created() {
        this.getConversations();
    },
    watch: {

        currentRoom(){
            console.log("Hello");

            this.connect();


        }
    },
    methods:{
        connect(){
            if(this.currentRoom.id){

                let vm = this;
                this.getMessages();
                window.Echo.private("chat."+this.currentRoom.id)
                .listen('message.new', e => {
                    vm.getMessages();
                });
            }
        },
        async  getConversations()  {
            try {
                const response = await axios.get("/messages/conversations");
                if(response.status == 200){
                    const conversations = response.data;
                    console.log(conversations);
                    if(conversations.status){
                        const _conversation = conversations.conversations
                        this.conversations = _conversation;
                        if(_conversation.length>0){
                            this.setRoom(_conversation[0]);
                        }else{

                        }
                    }
                }else{
                   alert("oops,there was be an error");
                }
            } catch (error) {
                alert("oops,there was be an error");

            }
        },
        async setRoom(room){
            this.currentRoom = room;
            // await this.getMessages();
        },
        async getMessages() {
            try {
                const response =  await axios.get("/messages/fetch/" + this.currentRoom.id);
                if(response.status == 200){
                    console.log(response.data);
                    this.messages = response.data.messages;
                }else{
                    alert("oops,there was be an error");
                }
            } catch (error) {
                alert("oops,there was be an error");
            }
        },

    },

}
</script>
