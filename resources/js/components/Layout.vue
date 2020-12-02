<template>
    <div class="container px-8">
        <main class="flex">
            <!-- 侧边栏（导航菜单） -->
            <navigation :authenticated="authenticated"></navigation>
            <!-- 主体内容 -->
            <div class="w-4/5 pt-12 px-4 py-4">
                <!-- 路由匹配到的组件将渲染在这里 -->
                <router-view></router-view>
            </div>
        </main>
        <!-- 底部内容 -->
        <bottom></bottom>
    </div>
</template>

<script>
import Navigation from './common/Navigation';
import Bottom from './common/Bottom';
export default {
    components: {Navigation, Bottom},
    computed: {
        authenticated() {
            return this.$store.getters.getUserAuthenticated;
        }
    }
}
</script>
