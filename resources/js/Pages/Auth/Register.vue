<template>
    <div class="w-full sm:w-full lg:w-1/2 mx-auto">
        <Head title="Register" />
        <div class="mt-12">
            <div class="mx-auto w-10/12 sm:w-10/12 lg:w-6/12 border">
                <div class="border shadow">
                    <form @submit.prevent="submit">
                        <div class="pt-12 px-6 w-auto">
                            <a href="#">
                                <img style="width: 150px;" class="mx-auto" src="/images/Instagram_logo.png" alt="Instagram Logo">
                            </a>
                            <div class="w-full pt-12 text-sm">
                                <input v-model="form.email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" placeholder="Email">
                                <div v-if="form.errors.email" class="text-red-500"> {{form.errors.email}} </div>
                            </div>
                            <div class="w-full mt-2 text-sm">
                                <input v-model="form.name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Name">
                                <div v-if="form.errors.name" class="text-red-500"> {{form.errors.name}} </div>
                            </div>
                            <div class="w-full mt-2 text-sm">
                                <input
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    type="password" v-model="form.password" placeholder="Password">
                                <div v-if="form.errors.password" class="text-red-500"> {{form.errors.password}} </div>
                            </div>
                            <div class="w-full my-8">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 py-1 px-4 w-full rounded text-white" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="border shadow bg-white mt-4 py-4 text-sm">
                    <p class="text-center">Already Registered? <Link class="text-blue-500 font-semibold" href="/">Login</Link></p>
                </div>
                <div class="mt-4 mb-4">
                    <p class="text-center">Get the app</p>
                </div>
                <div class="flex justify-center">
                    <img class="h-10" src="images/dowload_appstore_img.png" alt="Download for iPhone">
                    <img class="h-10 ml-2" src="images/download_googleplay_img.png" alt="Download for Android">
                </div>
            </div>
        </div>
        <FooterComponent />
    </div>
</template>

<script>
import { useForm, Link, Head } from "@inertiajs/inertia-vue3";
import FooterComponent from "../../components/FooterComponent";

export default {
    name: "Register",
    components: {
        Link,
        Head,
        FooterComponent
    },
    setup() {
        let form = useForm({
            name: '',
            email : '',
            password: ''
        })

        const submit = () => {
            form.post('/api/register');
        }

        return {
            form,
            submit
        }
    }
}
</script>

<style scoped>

</style>
