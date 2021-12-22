<template>
    <Head title="Add Drink" />

    <breeze-authenticated-layout>

        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet"/>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-8 ml-5">
                <Link :href="route('drinks.admin')" class="bg-red-500 hover:bg-red-700 text-white text-center py-2 px-4 rounded">Back</Link>
            </div>

            <form class="bg-white border max-w-xl m-6 mx-auto rounded-lg" @submit.prevent="form.post(route('drinks.store'))">
                <div class="w-1/2 m-4 mx-auto">
                    <div>
                        <InputLabel
                            v-model="form.name"
                            :inputId="'inputName'"
                            :labelText="'Name'"
                            :typeName="'text'"
                            :labelClass="'inline-block w-1/4'"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            v-model="form.price"
                            :inputId="'inputPrice'"
                            :labelText="'Price'"
                            :typeName="'number'"
                            :labelClass="'inline-block w-1/4'"
                            :step="0.1"
                        />
                    </div>

                    <breeze-validation-errors class="mt-3" />

                    <div class="mt-4">
                        <label class="inline-block w-1/4"></label>
                        <button type="submit" class="rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :disabled="form.processing">Create</button>
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
    props: [],
    data() {
        return {
            form: useForm({
                name: null,
                price: null,
            })
        }
    },
}
</script>
