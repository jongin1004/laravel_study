<template>
    <div class="w-1/5 border-r-2 border-solid borde-gray-600">
        <!-- key : 프라이머리 값을 넣어주면 나중에 변경해줄때 에러없이 확실히 가능해진다  -->
        <!-- @click : 이 div를 클릭했을 때 updateChatWith함수를 실행시켜라 -> user.id 데이터를 부모 components로 보내기 위함 -->
        <!-- :class bind -> js문을 사용가능하다 조건을 추가해서 조건을 만족했을 때에 css를 적용해라 -->
        <div      
            class="p-2 border border-gray-600 hover:bg-gray-300 cursor-pointer"            
            @click="updateChatWith(users.id)"
        >
            {{ users.name }} (前のメッセージ確認)
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            currentUser: {
                type:Number,
                required:true
            },
            //chatWith의 초기값은  null이기 때문에 false로 (필수 데이터는 아니다)
            chatWith: {
                type:Number,
                required:false
            }
        },
        //data에 있는 것들은 해당 vue파일에서 사용이 가능해짐
        data() {
            return {
                users: ''
            }
        },

      

        //axios는 json request를 좀 더 편하게 사용하기 위해서 laravel에서 제공함
        created() {
            axios.get('/api/users', {
                params: {
                    to: this.chatWith
                }
            }).then(res => {
                    console.log(res);
                    //this.users가 data() { users: []} 를 가르킨다. 
                    //console.log(res)를 통해서 users값을 확인해보면 위치가 data안에 users안에 있기 때문에 -> res.data.users
                    this.users = res.data.users;
            }).catch(error => {
                console.log(error)
            });
        },

        methods: {
            updateChatWith(userId) {
                //$emit 부모 components로 보낼때 사용한다. 
                this.$emit('updatedChatWith', userId);
            }
        }
    }
</script>

