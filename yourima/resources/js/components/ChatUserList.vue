<template>
    <div class="w-1/5 border-r-2 border-solid borde-gray-600">
        <div             
            v-for="user in usersWithoutSignedInUser"
            :key="user.id"
            class="p-2 border border-gray-600 hover:bg-gray-300 cursor-pointer"
            :class="{'text-pink-500': chatWith === user.id }"
            @click="updateChatWith(user.id)"
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
            },

            chatWith: {
                type:Number,
                required:false
            }
        },

        data() {
            return {
                users: []
            }
        },
    
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
        },

        methods: {
            updateChatWith(userId) {
                this.$emit('updatedChatWith', userId);
            }
        }
    }
</script>

