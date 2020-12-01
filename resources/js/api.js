const base = '/api/posts';

export default {
    // 请求文章详情页 API
    getPostData (id) {
        return axios.get(base + '/' + id);
    },

    // 请求博客首页 API
    getPostsData (page = 1) {
        return axios.get(base, {
            params: {page: page}
        });
    },

    // 请求博客分类页 API
    getCategoryPosts (name, page = 1) {
        return axios.get(base + '/category/' + name, {
            params: {page: page}
        });
    },

    // 请求分页数据 API
    getMorePosts (url) {
        return axios.get(url);
    }
}
