<template>
    <post-list v-if="loaded" :posts="posts" :links="links" @loadMorePosts="getMorePosts"></post-list>
    <loading v-else></loading>
</template>

<script>
import PostList from './common/List';
import Loading from "./common/Loading";
export default {
    components: {PostList, Loading},
    created() {
        this.$store.dispatch('loadPosts');
    },
    computed: {
        posts() {
            return this.$store.getters.getPostsData;
        },
        links() {
            return this.$store.getters.getPostsLink;
        },
        loaded() {
            return this.$store.getters.getPostsLoaded;
        }
    },
    methods: {
        getMorePosts(nextPageUrl) {
            this.$store.dispatch('loadMorePosts', nextPageUrl);
        }
    }
}
</script>
