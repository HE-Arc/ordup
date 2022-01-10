<template>
    <Head title="Update password" />

    <breeze-authenticated-layout>

        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet"/>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mt-8 ml-5">
                <Link :href="route('users.index')" class="bg-red-500 hover:bg-red-700 text-white text-center py-2 px-4 rounded">Back</Link>
            </div>

            <form class="bg-white border max-w-xl m-6 mx-auto rounded-lg" @submit.prevent="form.put(route('users.password.update'))">

                <div class="w-3/4 m-4 mx-auto">
                    <div>
                        <InputLabel
                            v-model="form.current_password"
                            :inputId="'inputCurrentPassword'"
                            :labelText="'Current password'"
                            :typeName="'password'"
                            :labelClass="'inline-block w-36'"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            v-model="form.new_password"
                            :inputId="'inputNewPassword'"
                            :labelText="'New password'"
                            :typeName="'password'"
                            :labelClass="'inline-block w-36'"
                        />
                        </div>

                    <div class="mt-4">
                        <InputLabel
                            v-model="form.confirm"
                            :inputId="'inputConfirm'"
                            :labelText="'Confirm'"
                            :typeName="'password'"
                            :labelClass="'inline-block w-36'"
                        />
                    </div>

                    <breeze-validation-errors class="mt-3" />

                    <div class="mt-4">
                        <label class="inline-block w-36"></label>
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
    data() {
        return {
            form: useForm({
                current_password: null,
                new_password: null,
                confirm: null
            })
        }
    },
}
</script>
