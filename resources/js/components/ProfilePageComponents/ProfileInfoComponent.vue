<template>
    <div class="flex">
        <!-- Profile Photo -->
        <div>
            <div class="relative w-24 h-24 sm:w-48 sm:h-48 lg:w-48 lg:h-48">
                <img class="rounded-full border border-gray-100 shadow-sm w-4/5" :src="'/images/profile_photos/' + $page.props.profile.photo" alt="user image" />
            </div>
        </div>
        <div class="mx-2 sm:mx-2 lg:ml-10 pt-2">
            <!-- Username -->
            <div class="h-10 float-left">
                <h1 class="text-2xl font-light">{{$page.props.auth.user.username}}</h1>
            </div>

            <!-- Top buttons -->
            <div class="ml-4 h-10 float-left">
                <Link class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded w-24 text-sm mr-2" href="/edit-profile">Edit Profile</Link>

            </div>

            <!-- Profile Info -->
            <div class="my-4" style="clear: both;">
                <div class="flex">
                    <div>
                        <span class="font-semibold">{{ postCount }}</span> posts
                    </div>
                    <div class="ml-8">
                        <span class="font-semibold">13.5k</span> followers
                    </div>
                    <div class="ml-8">
                        <span class="font-semibold">22</span> following
                    </div>
                </div>
            </div>

            <!-- Biography -->
            <div class="mt-2">
                    {{$page.props.profile.bio}}<br>
                <a v-if="$page.props.profile.site" :href="$page.props.profile.site" class="text-blue-500 hover:text-blue-800">{{$page.props.profile.site}}</a>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
    props: ['postCount'],
    name: "ProfileInfoComponent",
    components: {
        Link
    }
}
</script>

<style scoped>

</style>
