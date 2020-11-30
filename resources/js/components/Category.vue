<template>
    <div>
        <h1 class="mb-4 text-bold text-2xl">Category: {{ name }}</h1>
        <post-list></post-list>
    </div>
</template>

<script>
import PostList from "./common/List";
export default {
    components: {PostList},
    data () {
        return {
            name: ''
        }
    },
    mounted () {
        this.updateCategoryName();
    },
    watch: {
        '$route': 'updateCategoryName'
    },
    methods: {
        updateCategoryName ()  {
            this.name = this.$route.params.name.toUpperCase();
        },
    }
}
</script>
