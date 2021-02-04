<template>
    <!-- v-chat-scroll 자동적으로 스크롤을 내려주는 기능  -->
    <div class="flex-1 overflow-y-scroll" v-chat-scroll>
        <ChatMessage
            v-for="message in messages"
            :key="message.id"
            :message="message"
        ></ChatMessage>
    </div>
</template>

<script>
    import ChatMessage from "./ChatMessage";

    export default {
        components: {
            ChatMessage
        },

        props: {
            chatId: {
                type: Number,
                required:true
            },

            messages: {
                type: Array,
                required: true
            }
        }
    }
</script>


