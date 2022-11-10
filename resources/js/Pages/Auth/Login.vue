<template>
    <div class="w-full mx-auto">
        <Head title="Instagram" />
        <div class="mt-12 flex justify-center">
            <LeftContent />
            <LoginComponent />
        </div>
        <div class="flex justify-center">
            <FooterComponent />
        </div>
    </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import LeftContent from '../../components/Auth/LoginPageComponents/LeftContent.vue'
import LoginComponent from "../../components/Auth/LoginPageComponents/LoginComponent";
import FooterComponent from '../../components/FooterComponent'

export default {
    components: {
        Head,
        LeftContent,
        LoginComponent,
        FooterComponent
    },
}
</script>
