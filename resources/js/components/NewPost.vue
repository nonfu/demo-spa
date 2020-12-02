<template>
    <div class="bg-white shadow-md rounded mt-2 px-8 pt-6 pb-8 mb-6 flex flex-col">
        <flash-message v-if="publishedStatus" :success="publishedStatus === 1">
            <template slot="success">文章发布成功！</template>
            <template slot="error">文章发布失败！</template>
        </flash-message>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Title
                </label>
                <input required v-model="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="text" placeholder="在这里输入文章标题">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 md:w-1/2">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Category
                </label>
                <select required v-model="category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">
                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                </select>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 md:w-1/2">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Cover Image
                </label>
                <input required ref="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="file">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Content
                </label>
                <textarea required v-model="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker h-48" placeholder="在这里输入正文内容..."></textarea>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Summary
                </label>
                <textarea required v-model="summary" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="在这里输入文章摘要..."></textarea>
            </div>
        </div>
        <div class="flex items-center">
            <button @click="publishNewPost" type="button" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                立即发布
            </button>
        </div>
    </div>
</template>

<script>
import FlashMessage from "./common/FlashMessage";
export default {
    components: {FlashMessage},
    data() {
        return {
            title: '',
            category_id: '',
            content: '',
            summary: ''
        }
    },
    created() {
        this.$store.dispatch('loadPostsCategories');
    },
    computed: {
        categories() {
            return this.$store.getters.getPostsCategories;
        },
        publishedStatus() {
            return this.$store.getters.getPostStoredStatus;
        }
    },
    methods: {
        publishNewPost() {
            let formData = new FormData();
            formData.append('title', this.title);
            formData.append('category_id', this.category_id);
            formData.append('image', this.$refs.image.files[0]);
            formData.append('content', this.content);
            formData.append('summary', this.summary);
            this.$store.dispatch('publishNewPost', formData);
        }
    }
}
</script>
