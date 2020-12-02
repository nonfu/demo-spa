<style scoped>

</style>

<template>
    <div class="bg-white shadow-md rounded mt-6 px-8 pt-6 pb-8 mb-6 flex flex-col">
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2">
                Email
            </label>
            <input v-model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="email" placeholder="Email">
        </div>
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2">
                Password
            </label>
            <input v-model="password" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="password">
        </div>
        <div class="flex items-center justify-between">
            <button type="button" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                登录
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: ''
        }
    },

}
</script>
