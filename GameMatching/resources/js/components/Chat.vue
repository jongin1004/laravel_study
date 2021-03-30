<template>
    <div class="flex h-full">
        <!-- components를 가져다 쓴다 -->
        <div class="w-4/5 flex flex-col">
            <div class="flex-1">Chat Area</div>
            <div class="flex-initial p-2">
                <input class="border-2 border-solid rounded border-gray-600 w-full p-2" type="text">
            </div>
        </div>        
    </div>
</template>

<script>
    import ChatUserList from './ChatUserList';
    
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
