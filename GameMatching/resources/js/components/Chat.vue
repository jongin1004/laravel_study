<template>
    <div class="flex h-full">
        <!-- :current-user="currentUser" 자식 컴포넨트 ChatUserList에 currentUser값을 보냄 -->
        <!-- @updatedChatWith="updateChatWith" 자식 컴포넌트에서 $emit()를 통해서 보낸 값을 받아오는 작업  -->
        <ChatUserList 
            :current-user="currentUser"
            :friend-list="friendList"            
            :chat-with="chatWith"
            @updatedChatWith="updateChatWith"
        />

        <div v-if="chatWith" class="w-4/5 flex flex-col">
            <ChatArea 
                :chat-id="chatWith"
                :messages="messages"
            />

            <div class="flex-initial p-2">
                <!-- v-model은 data에 있는 text와 현재 input의 text를 연동시켜주는 것이다. input에서 값이 입력되었을 때, data에 text의 값도 실시간으로 바인딩된다. -->
                <!-- @keyup.enter="submit" 키보드의 enter가 눌렀다가 올라왔을 때, submit 이벤트를 실행시켜라  -->
                <input 
                    class="border-2 border-solid rounded border-gray-600 w-full p-2" 
                    type="text"
                    v-model="text"
                    @keyup.enter="submit"
                >
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
            },

            friendList: {
                type:Array,
                required: false
            }
        },

        components: {
            ChatUserList,
            ChatArea
        },

        data() {
            return {
                chatWith: null,
                text: '',
                messages: []
            }
        },
        
        mounted() {
            console.log('Component mounted.')
        },

        created() {
            //Echo - Laravel에서 제공하는 쉽게 채널에서 리슨하도록 도와주는 것
            window.Echo.private('chats').listen('MessageSent', e => {
                console.log(e);
                if(e.message.to === this.currentUser && e.message.from === this.chatWith){
                    this.messages.push(e.message);
                }                
            });
        },

        //자식 컴포넌트에서 보내온 value값 
        methods:{
            updateChatWith(value){
                this.chatWith = value;
                this.getMessages();
            },

            getMessages() {
            axios.get('/api/messages', {
                params: {
                    to: this.chatWith,
                    from: this.currentUser
                }            
            }).then(res => {                
                this.messages = res.data.messages;
            })
        },

            submit() {
                if(this.text){
                    axios.post('/api/messages', {
                        text: this.text,
                        to :this.chatWith,
                        from: this.currentUser
                    }).then(res => {
                        //submit을 하고 난 뒤에, 자동적으로 messages에 추가됨으로 써 refresh가 된다. 
                        this.messages.push(res.data.message); 
                    });
                }
                //메세지 보낸 다음에 iunput창 초기화
                this.text= '';
            }
        }
    }
</script>
