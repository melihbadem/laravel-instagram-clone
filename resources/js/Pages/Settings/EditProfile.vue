<template>
    <div>
        <Head title="Edit Profile" />
        <NavbarComponent />
        <div class="w-3/5 mt-5 flex border  mx-auto">
            <LeftMenuComponent :current-route="route.uri" />
            <div>
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="mt-5 mx-auto w-9/12 text-xs sm:text-sm lg:text-base">
                        <div class="flex">
                            <div class="w-16">
                                <label class="font-medium p-1">Bio</label>
                            </div>
                            <div class="ml-5">
                                <input v-model="form.bio" type="text" class="border p-1 rounded w-20 sm:w-auto lg:w-80 outline-none" placeholder="Biography" />
                                <p class="text-xs text-gray-500 mt-2">
                                    This field should not be left blank.
                                </p>
                            </div>
                        </div>

                        <div class="flex mt-8">
                            <div style="width: 5.5rem;">
                                <label class="font-medium p-1">Site</label>
                            </div>
                            <div class="ml-5">
                                <input v-model="form.site" type="text" class="border p-1 rounded w-20 sm:w-auto lg:w-80 outline-none"  placeholder="Site" />
                                <p class="text-xs text-gray-500 mt-2">
                                    It can be your own personal web address or the website of a company you work for, etc.
                                </p>
                            </div>
                        </div>

                        <div class="flex mt-8">
                            <div class="w-16">
                                <label class="font-medium p-1">Phone</label>
                            </div>
                            <div class="ml-5">
                                <input v-model="form.phone" type="text" class="border p-1 rounded w-20 sm:w-auto lg:w-80 outline-none" placeholder="Phone" />
                                <p class="text-xs text-gray-500 mt-2">
                                    This field should not be left blank.
                                </p>
                            </div>
                        </div>

                        <div class="flex mt-8">
                            <div class="w-16">
                                <label class="font-medium p-1">Photo</label>
                            </div>
                            <div class="ml-5">
                                <input type="file" @input="form.photo = $event.target.files[0]" class="block w-full  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                    {{ form.progress.percentage }}%
                                </progress>
                                <p class="text-xs text-gray-500 mt-2">
                                    This field should not be left blank.
                                </p>
                                <span class="text-xs text-red-500" v-if="form.errors.photo">{{ form.errors.photo }}</span>
                            </div>
                        </div>

                        <div class="flex mt-8">
                            <div class="w-16">
                                <label class="font-medium p-1">Sex</label>
                            </div>
                            <div class="ml-5">
                                <div class="form-check">
                                    <input v-model="form.sex" value="Male" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio">
                                    <label class="form-check-label inline-block text-gray-800">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input v-model="form.sex" value="Female" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio">
                                    <label class="form-check-label inline-block text-gray-800">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 mb-5">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">
                                Save changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full sm:w-1/2 lg:w-1/2 mx-auto">
            <FooterComponent />
        </div>

    </div>
</template>

<script>
import NavbarComponent from "../../components/NavbarComponent";
import LeftMenuComponent from "../../components/SettingsComponents/LeftMenuComponent";
import FooterComponent from "../../components/FooterComponent";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import { onMounted } from "vue";

export default {
    name: "EditProfile",
    props: ['route'],
    components: {
        NavbarComponent, LeftMenuComponent, FooterComponent, Head
    },
    setup() {
        const form = useForm({
            bio: null,
            site: null,
            phone: null,
            photo: null,
            sex: null
        })

        onMounted(() => {
            fetch('/api/get-profile-info', { method: 'POST' })
                .then(res => res.json())
                .then(data => {
                    form.bio = data.bio
                    form.site = data.site
                    form.phone = data.phone_number
                    form.sex = data.sex
                })
                .catch(err => console.log(err))
        })

        const submit = () => {
            form.post('/api/edit-profile',{
                forceFormData: true,
                method: 'PUT'
            })
        }

        return {
            form,
            submit
        }
    }
}
</script>
