<template>
    <Head title="Add an Employee" />

    <breeze-authenticated-layout>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form class="w-full md:w-2/3 justify-center border-2 rounded-lg m-4 mx-auto bg-white shadow" @submit.prevent="form.post(route('users.store'))">
                <div class="w-1/2 m-4 mx-auto">
                    <InputLabel
                        v-model="form.firstname"
                        :inputId="'inputFirstname'"
                        :labelText="'Firstname'"
                        :typeName="'text'"
                        :labelClass="'block md:inline-block w-32'"
                    />
                </div>

                <div class="w-1/2 m-4 mx-auto">
                    <InputLabel
                        v-model="form.lastname"
                        :inputId="'inputLastname'"
                        :labelText="'Lastname'"
                        :typeName="'text'"
                        :labelClass="'block md:inline-block w-32'"
                    />
                    </div>

                <div class="w-1/2 m-4 mx-auto">
                    <InputLabel
                        v-model="form.email"
                        :inputId="'inputMail'"
                        :labelText="'Mail'"
                        :typeName="'email'"
                        :labelClass="'block md:inline-block w-32'"
                    />
                </div>

                <div class="w-1/2 m-4 mx-auto">
                    <InputLabel
                        v-model="form.password"
                        :inputId="'inputPassword'"
                        :labelText="'Password'"
                        :typeName="'password'"
                        :labelClass="'block md:inline-block w-32'"
                    />
                </div>

                <div class="w-1/2 m-4 mx-auto">
                    <InputLabel
                        v-model="form.confirm_password"
                        :inputId="'inputConfirmPass'"
                        :labelText="'Confirm pass'"
                        :typeName="'password'"
                        :labelClass="'block md:inline-block w-32'"
                    />
                </div>

                <div class="w-1/2 m-4 mx-auto">
                    <InputLabel
                        v-model="form.is_admin"
                        :inputId="'inputCheckAdmin'"
                        :labelText="'is Admin ?  '"
                        :typeName="'checkbox'"
                        :labelClass="'inline-block w-32'"
                    />
                </div>

                <breeze-validation-errors class="mt-3" />
                <div class="w-1/2 m-4 mx-auto">
                    <label class="inline-block w-32"></label>
                    <button type="submit" class="rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :disabled="form.processing">Envoyer</button>
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
    props: [],
    data() {
        return {
            form: useForm({
                firstname: null,
                lastname:null,
                email:null,
                password:null,
                confirm_password:null,
                is_admin:null,
            })
        }
    },
}
</script>
