<template>
    <div class="bg-white shadow-md rounded mt-4 px-8 pt-6 pb-8 mb-6 flex flex-col">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    User Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="text" placeholder="学院君">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    E-mail
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="email" placeholder="Email">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Message
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="说点什么吧..."></textarea>
            </div>
        </div>
        <div class="flex items-center">
            <button type="button" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                发送
            </button>
        </div>
    </div>
</template>

<script>
export default {}
</script>
