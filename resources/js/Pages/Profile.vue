<template>
    <div>
        <Head title="Home" />
        <!--  dark:bg-neutral-900 dark:text-white -->
        <div id="app">
            <!--Navbar menu -->
            <NavbarComponent />

            <!-- Content -->
            <div class="mx-auto mt-10" style="max-width: 768px;">
                <ProfileInfoComponent :post-count="posts.length" />

                <!-- Stories -->
                <StoriesComponent />

                <div v-if="posts.length === 0">
                    <SharePostComponent />
                </div>
                <!--Posts -->
                <div v-else class="mt-12 flex w-full flex-wrap">
                    <div v-for="post in posts" :key="post.id" style="width: 32%; margin-right: 10px;">
                        <img class="h-5/6 w-full" :src="'images/post/' + post.image" />
                    </div>
             </div>
            </div>
        </div>
    </div>
</template>

<script>
import NavbarComponent from "../components/NavbarComponent";
import ProfileInfoComponent from "../components/ProfilePageComponents/ProfileInfoComponent";
import StoriesComponent from "../components/ProfilePageComponents/StoriesComponent";
import { useForm, Head } from "@inertiajs/inertia-vue3";
import SharePostComponent from "../components/SharePostComponent";

export default {
    components: {
        SharePostComponent,
        NavbarComponent,
        ProfileInfoComponent,
        StoriesComponent,
        Head
    },
    props: ['posts'],
    setup() {
        const logoutForm = useForm({})

        const logout = () => {
            logoutForm.post('/api/logout')
        }

        return {
            logout,
        }
    }
}
</script>
