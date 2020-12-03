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
        postsLoaded: false,
        postStoredStatus: 0,
        postsCategories: [],
        userAuthenticated: false
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
        },
        getPostStoredStatus(state) {
            return state.postStoredStatus;
        },
        getPostsCategories(state) {
            return state.postsCategories;
        },
        getUserAuthenticated(state) {
            return state.userAuthenticated;
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
        },
        setPostStoredStatus(state, status) {
            state.postStoredStatus = status;
        },
        setPostsCategories(state, categories) {
            state.postsCategories = categories;
        },
        setUserAuthenticated(state, authenticated) {
            state.userAuthenticated = authenticated;
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
        },
        loadPostsCategories(context) {
            PostAPI.getPostsCategories().then((resp) => {
                context.commit('setPostsCategories', resp.data.data);
            }).catch((err) => {
                console.log(err);
            });
        },
        publishNewPost(context, formData) {
            PostAPI.createNewPost(formData).then((resp) => {
                if (resp.data.success === true) {
                    context.commit('setPostStoredStatus', 1);  // 存储成功
                    dispatch('loadPosts');
                } else {
                    context.commit('setPostStoredStatus', 2);  // 存储失败
                }
            }).catch((err) => {
               console.log(err);
            });
        },
        loadLoginPage() {
            PostAPI.setCsrfCookie().then(resp => {
                // 成功添加 CSRF TOKEN 到 Cookie
            }).catch((err) => {
                console.log(err)
            });
        },
        userLogin(context, formData) {
            return new Promise((resolve, reject) => {
                PostAPI.login(formData).then(resp => {
                    if (resp.data.success === true) {
                        // 登录成功
                        context.commit('setUserAuthenticated', true);
                        resolve(resp);
                    }
                    reject(resp);
                }).catch(err => {
                    reject(err);
                })
            });
        },
        userLogout(context) {
            return new Promise((resolve, reject) => {
                PostAPI.logout().then(resp => {
                    context.commit('setUserAuthenticated', false);
                    resolve(resp);
                }).catch(err => {
                    reject(err);
                });
            });
        },
        loadUserAuthenticated(context) {
            PostAPI.getUserInfo().then(resp => {
                // 响应状态码为 200 表明用户认证成功，可以通过 resp.data 获取用户信息
                context.commit('setUserAuthenticated', true);
            }).catch(err => {
               console.log(err);
            });
        }
    }
});
