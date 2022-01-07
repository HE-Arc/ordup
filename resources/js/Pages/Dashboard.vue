<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex mt-8 ml-5">
                <h1 class="text-4xl">Dashboard</h1>
            </div>
            <div class="mr-8 md:m-8 justify-center md:flex">
                <div class="w-full border-2 rounded-lg m-4 p-4 md:mx-auto bg-white shadow">
                    <h2 class="text-xl md:text-2xl font-bold">Drinks</h2>
                    <p>Order drinks for your clients !</p>
                    <div class="mt-4 flex">
                        <Link :href="route('drinks.index')" class="ml-auto rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">See</Link>
                    </div>
                </div>

                <div class="w-1/4"></div>

                <div class="w-full border-2 rounded-lg m-4 p-4 md:mx-auto bg-white shadow">
                    <h2 class="text-xl md:text-2xl font-bold">Orders</h2>
                    <p>Get orders list !</p>
                    <div class="mt-4 flex">
                        <Link :href="route('commands.index')" class="ml-auto rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">See</Link>
                    </div>
                </div>

                <div class="w-1/4"></div>

                <div class="w-full border-2 rounded-lg m-4 p-4 md:mx-auto bg-white shadow">
                    <h2 class="text-xl md:text-2xl font-bold">Profil</h2>
                    <p>Change your password</p>
                    <div class="mt-4 flex">
                        <Link :href="route('commands.index')" class="ml-auto rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Change password</Link>
                    </div>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
    },
}
</script>
