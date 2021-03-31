<template>
    <div class="flex h-full">
        <!-- :current-user="currentUser" 자식 컴포넨트 ChatUserList에 currentUser값을 보냄 -->
        <!-- @updatedChatWith="updateChatWith" 자식 컴포넌트에서 $emit()를 통해서 보낸 값을 받아오는 작업  -->
        <ChatUserList 
            :current-user="currentUser"            
            @updatedChatWith="updateChatWith"
        />

        <div v-if="chatWith" class="w-4/5 flex flex-col">
            <ChatArea />

            <div class="flex-initial p-2">
                <input class="border-2 border-solid rounded border-gray-600 w-full p-2" type="text">
            </div>
        </div>
        <div v-else class="p-3">
            채팅 상대를 선택해주세요.
        </div>      
    </div>
</template>

<script>
    // components를 가져다 쓴다
    import ChatUserList from './ChatUserList';
    import ChatArea from './ChatArea';

    export default {
        props:{
            currentUser: {
                //다른 타입은 에러
                type: Number,
                //null이 되면 안된다. 항상 값이 들어와야한다.
                required: true
            }
        },

        components: {
            ChatUserList,
            ChatArea
        },

        data() {
            return {
                chatWith: null
            }
        },
        
        mounted() {
            console.log('Component mounted.')
        },

        //자식 컴포넌트에서 보내온 value값 
        methods:{
            updateChatWith(value){
                this.chatWith = value;
            }
        }
    }
</script>
