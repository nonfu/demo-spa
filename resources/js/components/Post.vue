<template>
    <post-content :post="post" v-if="loaded"></post-content>
</template>

<script>
import PostContent from './common/Content';

export default {
    components: {PostContent},
    data () {
        return {
            'post': null,
            'loaded': false
        }
    },
    mounted() {
        if (!this.loaded) {
            this.getPostData(this.$route.params.id);
        }
    },
    methods: {
        getPostData(postId) {
            axios.get('/api/posts/' + postId).then((resp) => {
                this.post = resp.data.data;
                this.loaded = true;
            }).then((err) => {
                console.log(err);
            })
        }
    }
}
</script>
