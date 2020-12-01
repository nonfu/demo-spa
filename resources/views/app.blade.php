<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="font-sans">
        <div id="app">
            <div class="container px-8">
                <main class="flex">
                    <!-- 侧边栏（导航菜单） -->
                    <aside class="w-1/5 pt-8">
                        <section class="mb-10">
                            <div class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0">
                                <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
                                    <img src="/images/logo.png" alt="学院君博客"/>
                                </div>
                                <nav class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                                    <router-link class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" to="/">Home</router-link>
                                    <router-link class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" :to="{ name: 'category', params: { name: 'php' }}">PHP</router-link>
                                    <router-link class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" :to="{ name: 'category', params: { name: 'golang' }}">Golang</router-link>
                                    <router-link class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" :to="{ name: 'category', params: { name: 'javascript' }}">Javascript</router-link>
                                    <router-link class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" to="/about">About</router-link>
                                    <router-link class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" to="/feedback">Feedback</router-link>
                                </nav>
                            </div>
                        </section>
                    </aside>

                    <!-- 主体内容 -->
                    <div class="w-4/5 pt-12 px-4 py-4">
                        <!-- 路由匹配到的组件将渲染在这里 -->
                        <router-view></router-view>
                    </div>
                </main>
                <!-- 底部内容 -->
                <footer class="border-t pt-8 pb-8 text-center lg:px-0">
                    <span class="text-sm text-gray-500">
                         &copy; Powered By Laravel + Vue + Tailwind
                    </span>
                </footer>
            </div>
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>

