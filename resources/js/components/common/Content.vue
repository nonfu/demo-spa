<style>
.post-content p {
    margin-bottom: 1.5rem;
}
</style>

<template>
    <div>
        <div class="mb-4 md:mb-0 w-full mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                 style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
            <img :src="post.image_url" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
            <div class="p-4 absolute bottom-0 left-0 z-20">
                <router-link :to="{ name: 'category', params: { name: post.category.name }}" class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">
                    {{ post.category.name }}
                </router-link>
                <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                    {{ post.title }}
                </h2>
                <div class="flex mt-3">
                    <img :src="post.author.avatar_url"class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                        <p class="font-semibold text-gray-200 text-sm"> {{ post.author.name }} </p>
                        <p class="font-semibold text-gray-400 text-xs"> {{ post.created_at }} </p>
                    </div>
                </div>
            </div>
        </div>

        <div v-html="post.content" class="post-content px-4 lg:px-0 mt-12 text-gray-700 mx-auto text-lg leading-relaxed">
        </div>
    </div>
</template>

<script>
export default {
    props: ['post']
}
</script>
