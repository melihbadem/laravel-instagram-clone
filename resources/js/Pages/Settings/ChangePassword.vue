<template>
    <div>
        <Head title="Change Password" />
        <NavbarComponent />
        <div class="w-3/5 mt-5 flex border  mx-auto">
            <LeftMenuComponent :current-route="route.uri" />
            <div>
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="mt-5 mx-auto w-9/12 text-xs sm:text-sm lg:text-base">
                        <div class="flex">
                            <div class="w-16">
                                <label class="font-medium text-xs p-1">Current password</label>
                            </div>
                            <div class="ml-5">
                                <input v-model="form.currentPassword" type="text" class="border p-1 rounded w-20 sm:w-auto lg:w-80 outline-none" placeholder="Current password" />
                                <p class="text-xs text-gray-500 mt-2">
                                    This field should not be left blank.
                                </p>
                                <span v-if="form.errors.currentPassword" class="text-red-500 text-xs">{{ form.errors.currentPassword }}</span>
                            </div>
                        </div>

                        <div class="flex mt-8">
                            <div style="width: 5.5rem;">
                                <label class="font-medium text-xs p-1">New password</label>
                            </div>
                            <div class="ml-5">
                                <input v-model="form.newPassword" type="text" class="border p-1 rounded w-20 sm:w-auto lg:w-80 outline-none"  placeholder="New password" />
                                <p class="text-xs text-gray-500 mt-2">
                                    Create a strong password. Password must be at least 5 characters.
                                </p>
                                <span v-if="form.errors.newPassword" class="text-red-500 text-xs">{{ form.errors.newPassword }}</span>
                            </div>
                        </div>

                        <div class="flex mt-8">
                            <div class="w-16">
                                <label class="font-medium text-xs p-1">Confirm password</label>
                            </div>
                            <div class="ml-5">
                                <input v-model="form.confirmPassword" type="text" class="border p-1 rounded w-20 sm:w-auto lg:w-80 outline-none" placeholder="Confirm" />
                                <p class="text-xs text-gray-500 mt-2">
                                    This field should not be left blank.
                                </p>
                                <span v-if="form.errors.confirmPassword" class="text-red-500 text-xs">{{ form.errors.confirmPassword }}</span>
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

export default {
    name: "EditProfile",
    props: ['route'],
    components: {
        NavbarComponent, LeftMenuComponent, FooterComponent, Head
    },
    setup() {
        const form = useForm({
            currentPassword: null,
            newPassword: null,
            confirmPassword: null,
        })

        const submit = () => {
            form.post('/api/change-password',{
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
