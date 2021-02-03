<template>
    <div class="flex h-full">
        <ChatUserList :current-user="currentUser"></ChatUserList>        
        <div v-if="chatWith" class="w-4/5 flex flex-col">
            <ChatArea></ChatArea>
            <div class="flex-initial p-2">
                <input
                    class="border-r-2 border-solid rounded border-gray-600 w-full p-3"
                    type="text"
                />
            </div>
        </div>
        <div v-else class="p-3">
            채팅 상대를 선택해주세요.
        </div>
    </div>
</template>

<script>
import ChatUserList from "./ChatUserList";
import ChatArea from "./ChatArea";

export default {
    props: {
        currentUser: {
            type:Number,
            required:true
        }
    },

    components: {
        ChatUserList,
        ChatArea
    },

    /** component에서 쓸 data가 들어간다.*/
    data() {
        return {
            chatWith:null
        }
    },

    mounted() {
        console.log("Component mounted.");
    }
};
</script>

<style></style>
