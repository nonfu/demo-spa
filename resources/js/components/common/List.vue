<template>
    <div>
        <list-item v-for="post in posts" :key="post.id" :post="post"></list-item>
    </div>
</template>

<script>
import ListItem from "./ListItem";
export default {
    components: {ListItem},
    props: ['posts']
}
</script>
