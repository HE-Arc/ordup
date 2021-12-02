<template>
    <Head title="Add an Employee" />

    <breeze-authenticated-layout>

        <div class="flex-none md:flex justify-center">
        <form class="w-2/3 md:w-2/3 border-2 border-blue-400 rounded-lg mg-4 bg-blue-100" @submit.prevent="form.post(route('addEmployee'))">
            <div class="w-1/2 m-4 mx-auto">
                <InputLabel
                    v-model="form.inputFirstname"
                    :inputId="'inputFirstname'"
                    :labelText="'Firstname'"
                    :typeName="'text'"
                    :labelClass="'inline-block w-1/4'"
                />
            </div>

            <div class="w-1/2 m-4 mx-auto">
                <InputLabel
                    v-model="form.inputLastname"
                    :inputId="'inputLastname'"
                    :labelText="'Lastname'"
                    :typeName="'text'"
                    :labelClass="'inline-block w-1/4'"
                />
            </div>

            <div class="w-1/2 m-4 mx-auto">
                <InputLabel
                    v-model="form.inputMail"
                    :inputId="'inputMail'"
                    :labelText="'Mail'"
                    :typeName="'email'"
                    :labelClass="'inline-block w-1/4'"
                />
            </div>

            <div class="w-1/2 m-4 mx-auto">
                <InputLabel
                    v-model="form.inputPassword"
                    :inputId="'inputPassword'"
                    :labelText="'Password'"
                    :typeName="'password'"
                    :labelClass="'inline-block w-1/4'"
                />
            </div>

            <div class="w-1/2 m-4 mx-auto">
                <InputLabel
                    v-model="form.inputConfirmPass"
                    :inputId="'inputConfirmPass'"
                    :labelText="'Confirm pass'"
                    :typeName="'password'"
                    :labelClass="'inline-block w-1/4'"
                />
            </div>

            <div class="w-1/2 m-4 mx-auto">
                <InputLabel
                    v-model="form.inputCheckAdmin"
                    :inputId="'inputCheckAdmin'"
                    :labelText="'is Admin ?  '"
                    :typeName="'checkbox'"
                    :labelClass="'inline-block w-1/4'"
                 />
            </div>

            <breeze-validation-errors class="mt-3" />
            <div  class="mt-4">
            <label class="inline-block w-1/4"></label>
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
                inputFirstname: null,
                inputLastname:null,
                inputMail:null,
                inputPassword:null,
                inputConfirmPass:null,
                inputCheckAdmin:null,
            })
        }
    },
}
</script>
