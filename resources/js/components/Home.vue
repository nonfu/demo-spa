<template>
    <post-list :posts="posts"></post-list>
</template>

<script>
import PostList from './common/List';
export default {
    components: {PostList},
    data () {
        return {
            'posts': []
        }
    },
    mounted() {
        this.getPostsData();
    },
    methods: {
        getPostsData () {
            axios.get('/api/posts').then((resp) => {
                this.posts = resp.data.data;
            }).catch((err) => {
                console.log('数据加载失败')
            });
        }
    }
}
</script>
