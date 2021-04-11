<template>
    <div>
        <div v-if="message.from.name">
            <strong>{{ message.from.name }} {{ convertFormatter() }}</strong>
        </div>
        <div v-else>
            <strong>{{ message.user.name }} {{ message.created_at}}</strong>
        </div>
        <div>
            {{ message.text }}
        </div>
    </div>
</template>

<script>
export default {
    props:{
        message: {
            type: Object,
            required: true
        }
    },
    
    methods:{
        convertFormatter(){            
            return this.message.created_at.slice(0, -8);
        }
    }
}
</script>
