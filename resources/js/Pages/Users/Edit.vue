<template>
    <Head title="Edit user" />

    <breeze-authenticated-layout>

        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet"/>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-8 ml-5">
                <Link :href="route('users.index')" class="bg-red-500 hover:bg-red-700 text-white text-center py-2 px-4 rounded">Back</Link>
            </div>

            <form class="bg-white border max-w-xl m-6 mx-auto rounded-lg" @submit.prevent="form.put(route('users.update', user))">

                <div class="w-2/3 m-4 mx-auto">
                    <div>
                        <InputLabel
                            v-model="form.firstname"
                            :inputId="'inputFirstname'"
                            :labelText="'Firstname'"
                            :typeName="'text'"
                            :labelClass="'inline-block w-32'"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            v-model="form.lastname"
                            :inputId="'inputLastname'"
                            :labelText="'Lastname'"
                            :typeName="'text'"
                            :labelClass="'inline-block w-32'"
                        />
                        </div>

                    <div class="mt-4">
                        <InputLabel
                            v-model="form.email"
                            :inputId="'inputMail'"
                            :labelText="'Mail'"
                            :typeName="'email'"
                            :labelClass="'inline-block w-32'"
                        />
                    </div>

                    <breeze-validation-errors class="mt-3" />

                    <div class="mt-4">
                        <label class="inline-block w-32"></label>
                        <button type="submit" class="rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :disabled="form.processing">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, useForm, Link } from '@inertiajs/inertia-vue3'
import InputLabel from '@/Components/Form/InputLabel.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        InputLabel,
        BreezeValidationErrors,
    },
    props: ['user'],
    data() {
        return {
            form: useForm({
                firstname: this.user.firstname,
                lastname: this.user.lastname,
                email: this.user.email
            })
        }
    },
}
</script>
