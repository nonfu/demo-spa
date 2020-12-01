<template>
    <post-content :post="post" v-if="loaded"></post-content>
    <loading v-else></loading>
</template>

<script>
import PostContent from './common/Content';
import Loading from "./common/Loading";

export default {
    components: {PostContent, Loading},
    created() {
        this.$store.dispatch('loadPost', this.$route.params.id);
    },
    computed: {
        post() {
            return this.$store.getters.getPostData;
        },
        loaded() {
            return this.$store.getters.getPostLoaded;
        }
    }
}
</script>
