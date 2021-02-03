<template>
    <div class="w-1/5 border-r-2 border-solid borde-gray-600">
        <div 
            v-for="user in usersWithoutSignedInUser"
            :key="user.id"
            class="p-2 border border-blue-600 hover:bg-gray-300"
        >
            {{ user.name }}
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            currentUser: {
                type:Number,
                required:true
            }
        },

        data() {
            return {
                users: []
            }
        },
        /**데이터가 바뀌면, 바뀐 데이터까지 계산 */
        computed: {
            usersWithoutSignedInUser(){
                return this.users.filter(user => user.id !== this.currentUser);
            }
        },


        created() {
            axios.get('/api/users').then(res => {
                    console.log(res);
                    this.users = res.data.user;
            }).catch(error => {
                console.log(error)
            });
        }
    }
</script>

<style></style>
