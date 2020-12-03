<template>
    <div class="bg-white shadow-md rounded mt-6 px-8 pt-6 pb-8 mb-6 flex flex-col">
        <flash-message v-if="submitted" :success="authenticated">
            <template slot="success">User Login Successfully! </template>
            <template slot="error">User Login Failed! </template>
        </flash-message>
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
            <button @click="login" type="button" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                立即登录
            </button>
        </div>
    </div>
</template>

<script>
import FlashMessage from "./common/FlashMessage";
export default {
    components: {FlashMessage},
    data() {
        return {
            email: '',
            password: '',
            submitted: false
        }
    },
    created() {
        this.$store.dispatch('loadLoginPage');
    },
    computed: {
        authenticated() {
            return this.$store.getters.getUserAuthenticated;
        }
    },
    methods: {
        login() {
            let formData = new FormData();
            formData.append('email', this.email);
            formData.append('password', this.password);
            this.$store.dispatch('userLogin', formData).then(resp => {
                // 存储登录状态到 localStorage 以便直接通过 URL 访问可以识别登录状态
                localStorage.setItem('authenticated', '1');
                // 登录成功后跳转到首页
                this.$router.push('/');
            }).catch(err => {
                console.log(err)
            });
            this.submitted = true;
        }
    }
}
</script>
