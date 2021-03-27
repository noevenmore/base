<template>
<div class="flex flex-col flex-none w-full h-full shadow">
    <div class="flex justify-end rounded-t bg-gradient-to-b from-gray-300 to-gray-200 border border-gray-600 px-3 py-2">
        <p @click="deleteImg" class="bg-red-700 hover:bg-red-800 shadow cursor-pointer rounded-lg px-2 text-white border-red-900 border transform duration-200 hover:scale-110">X</p>
    </div>

    <div class="border border-t-0 border-gray-600 p-2 flex justify-center h-full">
        <img :src="src" alt="wrong-image-link" class="object-contain">
    </div>
</div>
</template>

<script>
export default {
    methods:{
    deleteImg : function()
    {
        this.$emit('deleteImg', this.src);
    }
    },
    props:{
        src:''
    },
    data: 
        function()
        {
            return {
                show:true,
            }
        }
    
}
</script>