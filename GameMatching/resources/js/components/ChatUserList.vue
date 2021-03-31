<template>
    <div class="w-1/5 border-r-2 border-solid border-gray-600">
        <!-- v-for로 반복문을 실행 -->
        <!-- key 유니크한 값을 등록 (유니크한 값이 없을 경우에는  v-for="(user, index) 이런식으로 사용하면 된다.-->
        <!-- @click 현재 div를 클릭했을 때에 어떠한 이벤트를 발생시킨다. -->
        <div
            v-for="user in usersWithoutSignedInUser"
            :key="user.id"
            class="p-2 border-b-2 border-gray-600 hover:bg-gray-300 cursor-pointer"
            @click="updateChatWith(user.id)"
        >
            {{ user.name }}
        </div>
    </div>
</template>

<script>
    export default{
        props:{
            currentUser: {
                //다른 타입은 에러
                type: Number,
                //null이 되면 안된다. 항상 값이 들어와야한다.
                required: true
            }
        },

        //데이터가 변경되면, 변경된 값으로 계산해주는 (데이터가 바뀔때마다)
        computed: {
            //현재 로그인한 유저의 id는 유저목록에 나오면 안되니까 그것을 제외해주기 위해 filtering한 것 
            usersWithoutSignedInUser(){
                //this를 사용해서 props의 값이나 data의 값에 접근이 가능해진다.
                return this.users.filter(user => user.id !== this.currentUser);
            }
        },

        //date() 리퀘스트를 통해서 받아온 데이터(User list)값을 위의 vue 컴포넌트에서 사용하기 위해서 설정 
        data() {
            return {
                //이 안에 설정된 값들은 위의 template 태그 안에서 사용가능하다.
                users: []                
            }
        },

        created() {
            //axios는 아작스 리퀘스트를 쉽게 보낼 수 있도록 만들어진 패키지
            //api.php에 만들어둔 Route
            axios.get('/api/users').then(res => {                                              
                console.log(res);
                //this.users -> date() 안에 있는 users에 접근
                //res.data.user -> 가져온 값 res의 data안에 users안에 있는 값을 가르킴
                this.users = res.data.users;
            }).catch(error => {
                console.log(error);
            });
        },

        methods: {
            updateChatWith(userId){
                //$emit() 부모 컴포넌트에 값을 보낼때
                this.$emit('updatedChatWith', userId);
            }
        }
    }
</script>
