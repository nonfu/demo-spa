<template>
    <post-list v-if="loaded" :posts="posts" :links="links" @loadMorePosts="getMorePosts"></post-list>
    <loading v-else></loading>
</template>

<script>
import PostList from './common/List';
import Loading from "./common/Loading";

export default {
    components: {PostList, Loading},
    data () {
        return {
            name: '',
            posts: [],
            links: {},
            loaded: false
        }
    },
    mounted () {
        if (!this.loaded) {
            this.updateCategoryName();
        }
    },
    watch: {
        '$route': 'updateCategoryName'
    },
    methods: {
        updateCategoryName ()  {
            this.name = this.$route.params.name.toUpperCase();
            this.getCategoryPosts();
        },
        getCategoryPosts() {
            axios.get('/api/posts/category/' + this.name).then((resp) => {
                this.posts = resp.data.data;
                this.links = resp.data.links;
                this.loaded = true;
            }).catch((err) => {
                console.log(err);
            })
        },
        getMorePosts(nextPageUrl) {
            axios.get(nextPageUrl).then((resp) => {
                this.posts.push(...resp.data.data);
                this.links = resp.data.links;
                this.loaded = true;
            }).catch((err) => {
                console.log(err);
            })
        }
    }
}
</script>
