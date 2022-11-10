<template>
    <Head title="Home" />
    <NavbarComponent />
    <div class="w-11/12 sm:w-11/12 lg:w-3/5 mx-auto mt-5 flex">
        <div  v-if="posts.length != 0"  class="w-full sm:w-full lg:w-2/3">
            <div v-for="post in posts" :key="post.id" class="border border-gray shadow-sm mb-5">
                <div id="content-header" class="flex p-2">
                    <div class="relative w-10 h-10">
                        <img class="rounded-full border border-gray-100 shadow-sm" :src="'images/profile_photos/' + post.get_user_profile_info.photo" alt="user image" />
                    </div>
                    <p class="leading-10 ml-3 font-medium text-sm font-sans">{{ post.get_user.name}}</p>
                </div>
                <div id="content">
                    <img class="w-full" :src="'images/post/' + post.image" />
                </div>
                <div id="content-bottom" class="flex items-start">
                    <span class="font-medium text-sm font-sans my-3" style="font-family: 'Segoe UI', sans-serif;">
                        {{ post.get_user.name }} <span class="font-normal">{{ post.content }}</span>
                    </span>
                </div>
            </div>
        </div>
        <SharePostComponent v-else />
        <div class="text-center w-1/3 hidden sm:hidden lg:block">
            <div class="flex p-2 mb-2">
                <div class=" w-16 h-16">
                    <img class="rounded-full border border-gray-100 shadow-sm" :src="'/images/profile_photos/' + $page.props.profile.photo" alt="user image" />
                </div>
                <div class="flex flex-col items-start p-0">
                    <span class="leading-10 ml-3 font-medium text-sm font-sans">{{ $page.props.auth.user.username}}</span>
                </div>
            </div>
            <h1 class="text-xl mb-2">Get the app</h1>
            <div class="flex items-center justify-center">
                <img class="w-24 mr-2" src="images/dowload_appstore_img.png" />
                <img class="w-24" src="images/download_googleplay_img.png" alt="">
            </div>
            <div class="mt-2 text-gray-400 text-sm">
                &copy; 2022 Instagram Clone
            </div>
        </div>
    </div>
</template>

<script>
import NavbarComponent from "../components/NavbarComponent";
import SharePostComponent from "../components/SharePostComponent";
import { Head } from "@inertiajs/inertia-vue3";

export default {
    name: "HomepageComponent",
    components: {
        NavbarComponent,
        SharePostComponent,
        Head
    },
    props: ['posts'],
    setup() {
        //
    }
}
</script>
