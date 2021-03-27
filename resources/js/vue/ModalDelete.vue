<template>
<div class="fixed flex items-center justify-center z-10 inset-0 overflow-y-auto transition duration-300">
    <div class="fixed w-full h-screen bg-gray-900 opacity-50 z-20" @click="$emit('doCancel')"></div>
    <div class="fixed flex items-end z-30 min-w-1/2">
        <div class="w-full block bg-gray-100 rounded p-4">
            <div class="flex justify-between border-b-2 border-gray-900 pb-2">
                <p class="flex font-semibold items-center">{{caption}}</p>
                <p @click="$emit('doCancel')"
                    class="font-semibold bg-red-700 hover:bg-red-800 px-3 py-1 rounded-lg cursor-pointer text-white">X
                </p>
            </div>
            <p class="pt-3">{{text}}</p>
            <div class="flex justify-end space-x-3 mt-5">
                <p @click="$emit('doSubmit')" class="px-3 py-1 bg-green-700 hover:bg-green-800 rounded cursor-pointer text-white">OK</p>
                <p @click="$emit('doCancel')"
                    class="px-3 py-1 bg-red-700 hover:bg-red-800 rounded cursor-pointer text-white">Отмена</p>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default
{
    props:{
        caption:String,
        text:String
    },
}
</script>