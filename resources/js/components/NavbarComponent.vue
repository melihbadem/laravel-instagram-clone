<template>
    <nav class="w-full shadow py-4">
        <!--dark:border-b-2 dark:border-indigo-500-->
        <div class="flex">
            <div class="w-2/6">
                <Link href="/home" class="hidden sm:block lg:block">
                    <img src="images/Instagram_logo.png" class="mx-auto" width="100" height="50">
                </Link>
                <div class="mx-auto flex block sm:hidden lg:hidden ml-2">
                    <button @click="showMobileMenu"><i class="fas fa-bars"></i></button>
                    <img src="images/Instagram_logo.png" class="mx-auto" width="100" height="50">
                </div>
            </div>
            <div class="w-2/6 text-center">

                <div id="mobilemenu" class="text-left hidden sm:hidden lg:hidden mt-5">
                    <input
                        class="mx-auto hidden sm:block lg:block shadow-sm border rounded py-1 px-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" placeholder="Search">
                    <input
                        class="mx-auto shadow-sm border rounded py-1 px-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" placeholder="Search">
                    <div class="mt-1">
                        <Link class="hover:text-blue-500 text-sm" href="/home"><i class="fa-solid fa-house ml-2"></i>
                            Home</Link>
                    </div>
                    <div>
                        <Link class="hover:text-blue-500 text-sm" href="/profile" title="Profile"><i class="far fa-user ml-2"></i>
                            Profile</Link>
                    </div>
                    <div>
                        <a class="hover:text-blue-500 text-sm" href="javascript:void(0)" @click="showModal">
                            <i class="fa-solid fa-circle-plus ml-2"></i>
                            New post
                        </a>
                    </div>
                    <div>
                        <a class="hover:text-blue-500 text-sm" href="javascript:void(0)" @click="logout">
                            <i class="fa-solid fa-arrow-right-from-bracket ml-2"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-2/6 text-center invisible sm:visible lg:visible">
                <Link href="/home" title="Home">
                    <i class="fa-solid fa-house ml-4"></i>
                </Link>
                <Link href="/profile" title="Profile">
                    <i class="far fa-user ml-4"></i>
                </Link>
                <a href="javascript:void(0)" @click="showModal" title="Add new post">
                    <i class="fa-solid fa-circle-plus ml-4"></i>
                </a>
                <a href="javascript:void(0)" @click="logout" title="Logout">
                    <i class="fa-solid fa-arrow-right-from-bracket ml-4"></i>
                </a>
            </div>
            <!--        Modal begin-->
            <div class="fixed hidden inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50" id="my-modal">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3">
                        <div class="mx-auto flex flex-col h-6 w-6 rounded-full bg-red-500 float-right cursor-pointer text-center">
                            <span class="text-lg text-white cursor-pointer leading-6" @click="closeModal">&times;</span>
                        </div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Share a new post</h3>
                        <form @submit.prevent="submit" enctype="multipart/form-data">
                        <div class="mt-2 px-7 py-3">
                            <div class="flex flex-col justify-center">
                                <div class="mb-3 flex flex-col">
                                    <p class="text-gray-500">Post Content</p>
                                    <textarea v-model="form.content" class="form-control w-auto px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" rows="5" placeholder="Post conent"></textarea>
                                    <div v-if="form.errors.content" class="text-red-500">{{ form.errors.content }}</div>
                                    <p class="text-gray-500 mt-3">
                                        Select a photo
                                    </p>
                                    <div>
                                        <input type="file" @input="form.photo = $event.target.files[0]" class="px-3 py-1.5 w-auto text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                                    </div>
                                    <div v-if="form.errors.photo" class="text-red-500">{{ form.errors.photo }}</div>
                                    <div>
                                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                            {{ form.progress.percentage }}%
                                        </progress>
                                    </div>
                                </div>

                            </div>
                            <div class="items-center px-4 py-3">
                                <button type="submit" id="ok-btn" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                                    Share
                                </button>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--        Modal end-->
        </div>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    name: "NavbarComponent",
    components: {
        Link
    },
    setup() {

        const forms = {
            form: useForm({
                content: null,
                photo: null
            }),
            logoutForm: useForm({})
        }

        const functions = {
            showModal: () => {
                document.getElementById("my-modal").style.display = "block";
            },
            closeModal: () => {
                document.getElementById("my-modal").style.display = "none";
            },
            showMobileMenu: () => {
                document.getElementById("mobilemenu").classList.toggle("hidden")
            },
            logout: () => {
                forms.logoutForm.post('/api/logout')
            },
            submit: async () => {
                await forms.form.post('/api/share',{
                    forceFormData: true,
                    method: 'POST'
                })
                if (!forms.form.errors.photo && !forms.form.errors.content) {
                    functions.closeModal()
                    forms.form.content = null
                    forms.form.photo = null
                }
            }
        }

      return {
          ...functions,
          ...forms
      }
    }
}
</script>
