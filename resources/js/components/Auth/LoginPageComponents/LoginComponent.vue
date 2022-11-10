<template>
    <div class="mx-auto sm:mx-0 lg:mx-0">
        <div class="border shadow">
            <form @submit.prevent="submit" class="">
                <div class="pt-6 px-6 w-auto">
                    <a href="#">
                        <img style="width: 150px;" class="mx-auto" src="/images/Instagram_logo.png" alt="Instagram Logo">
                    </a>
                    <div class="w-full pt-12 text-sm">
                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Email" v-model="myForm.email">
                        <div v-if="myForm.errors.email" class="text-red-500"> {{ myForm.errors.email }} </div>
                    </div>
                    <div class="w-full mt-2 text-sm">
                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="Password" v-model="myForm.password">
                        <div v-if="myForm.errors.password" class="text-red-500">{{ myForm.errors.password }}</div>
                    </div>
                    <div class="w-full mt-2">
                        <button class="bg-blue-500 hover:bg-blue-700 py-1 px-4 w-full rounded text-white" type="submit">Login</button>
                    </div>
                    <div class="flex justify-center mt-4 mb-8">
                        <div class="w-1/3 leading-3 text-gray-500 text-xs">OR</div>
                    </div>
                    <div class="mb-4 text-center">
                        <a href="#" class="text-blue-900 font-semibold">Log in with facebook</a>
                    </div>

                    <div class="mb-4 text-center">
                        <a href="#" class="text-gray-700 text-xs">Forgot password?</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="border shadow bg-white mt-4 py-4">
            <p class="text-center"> <Link class="text-blue-500 font-semibold" href="/register">Sign up</Link></p>
        </div>
        <div class="mt-4 mb-4">
            <p class="text-center">Get the app</p>
        </div>
        <div class="flex">
            <img class="h-10" src="images/dowload_appstore_img.png" alt="Download for iPhone">
            <img class="h-10 ml-2" src="images/download_googleplay_img.png" alt="Download for Android">
        </div>
    </div>
</template>

<script>
import { useForm, Link } from "@inertiajs/inertia-vue3";

export default {
    name: "LoginComponent",
    components: {
        Link
    },
    setup() {
        let myForm = useForm({
            email: '',
            password: ''
        })

        const submit = () => {
            myForm.post('/api/login')
        }

        return {
            myForm,
            submit,
        }
    }
}
</script>
