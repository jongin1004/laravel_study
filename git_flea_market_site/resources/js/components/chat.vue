<template>
    <div class="flex h-64">        
        <!-- chatUserList components에서부터 emit를 통해 user.id를 받아오기 위해서 부모 componens에서도 
        updateChatWith 메소드를 지정해서 value를 받아오고 있다.  -->
        <!-- chatwith를 chatUserList에 보내는 이유는 현제 대화하고있는 상대를 표시하기 위함 -->
        <ChatUserList 
            :current-user="currentUser"
            :chat-with="chatWith"
            @updatedChatWith="updateChatWith"            
        ></ChatUserList>        
        <div v-if="chatWith" class="w-4/5 flex flex-col">
            <ChatArea
                :chat-id="chatWith"
                :messages="messages"
            ></ChatArea>
            <div class="flex-initial p-2">
                <!-- v-model="text" input text와 지금 date() 에있는 text가 실시간 연동되게 해준다.   -->
                <input
                    class="border-2 rounded border-gray-500 w-full p-3"
                    type="text"
                    placeholder="メッセージを入力してください"
                    v-model="text"
                    @keyup.enter="submit"                    
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
    //부모 components로 부터 받아온 데이터값 
    //type 은 Number -> 다른 값일 땐 에러 
    //required : true 항상 보내져야하는 값이다. 
    props: {
        currentUser: {
            type:Number,
            required:true
        },
        
        chatWith: {
            type:Number,
            required:true
        }
    },

    components: {
        ChatUserList,
        ChatArea
    },

    data() {
        return {
            chatWith:null,
            text:'',
            messages: []
        }
    },
    //lisen을 통해서 유저들에게 message를 보내주는 역할 
    //window.Echo : laravel에서 제공하는 listen기능을 쉽게 사용하는 것
    created() {
        window.Echo.private('chats').listen('MessageSent', e => {
            if(e.message.to === this.currentUser && e.message.from === this.chatWith){
                this.messages.push(e.message);
            }                        
        });
    },

    methods: {
        updateChatWith(value) {
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
                console.log(res);
                this.messages = res.data.messages;
            })
        },

        submit() {
            //if문을 쓴이유는 text가 있을 때만 저장하겠다는 뜻 
            if(this.text) {
                axios.post('/api/messages', {
                    text: this.text,
                    to: this.chatWith,
                    from: this.currentUser
                }).then(res => {
                    this.messages.push(res.data.message);
                });
            }
            //text를 저장하고 나서는 text창 초기화
            this.text='';
        }
    }
}
</script>

