<template>
    <div>
        <list-item v-for="post in posts" :key="post.id" :post="post"></list-item>
        <div class="w-full text-center mx-auto">
            <button
                v-if="links.next"
                @click="loadMorePosts"
                type="button"
                class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
            >
                加载更多文章
            </button>
        </div>
    </div>
</template>

<script>
import ListItem from "./ListItem";

export default {
    components: {ListItem},
    props: ['posts', 'links'],
    methods: {
        loadMorePosts() {
            this.$emit('loadMorePosts', this.links.next);
        }
    }
}
</script>
