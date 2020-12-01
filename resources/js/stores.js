import Vue from 'vue';
import Vuex from 'vuex';
import PostAPI from './api';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        postData: {},
        postLoaded: false,
        postsData: [],
        postsLink: {},
        postsLoaded: false
    },
    getters: {
        getPostData (state) {
            return state.postData;
        },
        getPostLoaded(state) {
            return state.postLoaded;
        },
        getPostsData(state) {
            return state.postsData;
        },
        getPostsLink(state) {
            return state.postsLink;
        },
        getPostsLoaded(state) {
            return state.postsLoaded;
        }
    },
    mutations: {
        setPostData(state, post) {
            state.postData = post;
        },
        setPostLoaded(state, loaded) {
            state.postLoaded = loaded;
        },
        setPostsData(state, posts) {
            state.postsData = posts;
        },
        setPostsLink(state, links) {
            state.postsLink = links;
        },
        setPostsLoaded(state, loaded) {
            state.postsLoaded = loaded;
        }
    },
    actions: {
        loadPost(context, id) {
            PostAPI.getPostData(id).then((resp) => {
                context.commit('setPostData', resp.data.data);
                context.commit('setPostLoaded', true);
            }).catch((err) => {
                console.log(err);
            });
        },
        loadPosts(context, name = null) {
            let request;
            if (name) {
                request = PostAPI.getCategoryPosts(name);
            } else {
                request = PostAPI.getPostsData();
            }
            request.then((resp) => {
                context.commit('setPostsData', resp.data.data);
                context.commit('setPostsLink', resp.data.links);
                context.commit('setPostsLoaded', true);
            }).catch((err) => {
                console.log(err);
            });
        },
        loadMorePosts(context, url) {
            PostAPI.getMorePosts(url).then((resp) => {
                let postsData = context.getters.getPostsData;
                postsData.push(...resp.data.data);
                context.commit('setPostsData', postsData);
                context.commit('setPostsLink', resp.data.links);
                context.commit('setPostsLoaded', true);
            }).catch((err) => {
                console.log(err);
            });
        }
    }
});
