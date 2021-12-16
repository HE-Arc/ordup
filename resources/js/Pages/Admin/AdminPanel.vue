<template>
    <Head title="Admin Panel" />

    <BreezeAuthenticatedLayout>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex mt-8 ml-5">
                <h1 class="text-4xl">Admin panel</h1>
            </div>
            <div class="mr-8 md:m-8 justify-center md:flex">
                <div class="w-full border-2 rounded-lg m-4 p-4 md:mx-auto bg-white shadow">
                    <h2 class="text-xl md:text-2xl font-bold">Drinks admin</h2>
                    <p>
                        Here you can add new drinks in your menu to enrich it. You can also change the name of your drinks and their price with just one click. No longer serve a drink ? remove it !
                    </p>
                    <div class="mt-4 flex">
                        <Link :href="route('drinks.admin')" class="ml-auto rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Manage</Link>
                    </div>
                </div>

                <div class="w-1/4"></div>

                <div class="w-full border-2 rounded-lg m-4 p-4 md:mx-auto bg-white shadow">
                    <h2 class="text-xl md:text-2xl font-bold">Users admin</h2>
                    <p>
                        Manage your team by adding new waiters or co-managers. You can change their information in case of incorrect data or delete an employee who withdraws from the adventure.
                    </p>
                    <div class="mt-4 flex">
                        <Link :href="route('users.index')" class="ml-auto rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Manage</Link>
                    </div>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Link } from "@inertiajs/inertia-vue3";
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
    },
}
</script>
