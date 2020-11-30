<template>
    <div class="border w-full lg:flex mb-5">
        <div class="h-48 lg:w-48 flex-none bg-cover text-center overflow-hidden opacity-75"
             :style="'background-image: url(' + post.image_url  +')'" :title="post.title">
        </div>
        <div class="bg-white px-4 flex flex-col justify-between leading-normal pt-2 pb-2">
            <div>
                <div class="mt-3 md:mt-0 text-gray-700 font-bold text-2xl mb-2">
                    <router-link :to="{ name: 'post', params: { id: post.id }}">
                        {{ post.title }}
                    </router-link>
                </div>
                <p class="text-gray-700 text-base">
                    {{ post.summary }}
                </p>
            </div>
            <div class="flex mt-3">
                <img :src="post.author.avatar_url" class="h-10 w-10 rounded-full mr-2 object-cover" />
                <div>
                    <p class="font-semibold text-gray-700 text-sm capitalize"> {{ post.author.name }} </p>
                    <p class="text-gray-600 text-xs"> {{ post.created_at }} </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['post']
}
</script>
