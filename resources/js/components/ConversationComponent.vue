<template>
    <div class="col-xl-4 col-lg-5 col-md-12">
        <div class="msg_search">
            <div class="ui search focus">
                <div class="ui left icon input swdh11 swdh15">
                    <input class="prompt srch_explore" type="text" placeholder="Search Messages..." />
                    <i class="uil uil-search-alt icon icon8"></i>
                </div>
            </div>
        </div>
        <div class="simplebar-content-wrapper">
            <div class="group_messages">

                <div v-for="conversation in conversations" :key="conversation.id" :class="['chat__message__dt', conversation.id == currentRoom.id ? 'active' : '']">
                    <div class="user-status">
                        <div class="user-avatar">
                            <img v-if="conversation.user.photo == null" src="assets/images/left-imgs/img-1.jpg" alt="" />
                            <img v-if="conversation.user.photo != null" :src=conversation.user.photo alt="" />
                            <div class="msg__badge" v-if="conversation.unseen != 0">{{ conversation.unseen }}</div>
                        </div>
                        <p class="user-status-title"><span class="bold">{{ conversation.user.fullname }}</span></p>
                        <p class="user-status-text">{{ conversation.last_message.message }}</p>
                        <p class="user-status-time floaty">{{ conversation.updated_at }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "ConversationComponeent",
    props: ["conversations", "currentRoom"]
}
</script>
