<template>
    <div class="w-1/4 list-none leading-10 indent-2 border-r hidden sm:hidden lg:block">
        <ul>
            <Link href="/edit-profile" v-bind:class="{'font-medium' : currentRoute === 'edit-profile'}">
                <li>Edit Profile Info</li>
            </Link>
            <Link href="/change-password" v-bind:class="{'font-medium' : currentRoute === 'change-password'}">
                <li>Change Password</li>
            </Link>
        </ul>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    props:['currentRoute'],
    name: "LeftMenuComponent",
    components: {
        Link
    }
}
</script>
