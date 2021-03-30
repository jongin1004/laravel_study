<template>
    <div class="w-1/5 border-r-2 border-solid border-gray-600">
        <!--v-for로 반복문을 실행-->
        <!-- key 유니크한 값을 등록 (유니크한 값이 없을 경우에는  v-for="(user, index) 이런식으로 사용하면 된다.-->
        <div
            v-for="user in users"
            :key="user.id" 
        >
            {{ user.name }}
        </div>
    </div>
</template>

<script>
    export default{
        //date() 리퀘스트를 통해서 받아온 데이터(User list)값을 위의 vue 컴포넌트에서 사용하기 위해서 설정 
        data() {
            return {
                //이 안에 설정된 값들은 위의 template 태그 안에서 사용가능하다.
                users: [],
                message: '안녕하세요 Vue!'
            }
        },

        created() {
            //axios는 아작스 리퀘스트를 쉽게 보낼 수 있도록 만들어진 패키지
            //api.php에 만들어둔 Route
            axios.get('/api/users').then(res => {                                              
                //this.users -> date() 안에 있는 users에 접근
                //res.data.user -> 가져온 값 res의 data안에 users안에 있는 값을 가르킴
                this.users = res.data.users;
            }).catch(error => {
                console.log(error);
            });
        }
    }
</script>
