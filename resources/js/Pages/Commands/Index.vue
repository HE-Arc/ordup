<template>
  <Head title="Commands" />

  <breeze-authenticated-layout>

    <!-- source : https://tailwindcomponents.com/components/tables -->
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet"
    />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex mt-8 ml-5">
            <h1 class="text-4xl">Order list</h1>
        </div>
        <div class="mr-8 md:m-8 justify-center">
            <div v-for="data in datas" :key="data['id']"
            class="w-full md:w-2/3 border-2 rounded-lg m-4 md:mx-auto bg-white shadow">
                <div class="flex m-4 border-b-2 pb-2">
                    <h2 class="text-xl md:text-2xl font-bold">{{data['waiter_name']}}</h2>
                    <h3 class="text-lg md:text-2xl align-middle">&nbsp;-&nbsp;{{data['table']}}</h3>
                    <h3 class="md:text-xl ml-auto align-middle">{{data['date']}}</h3>
                </div>
                <ul class="m-4 ml-12 list-disc">
                    <li v-for="(quantity, drink) in data['drinks']" :key="drink">
                        <span class="ml-2 text-lg inline-block w-60">{{drink}}</span><span>{{quantity}}x</span>
                    </li>
                </ul>
                <div class="m-4 flex border-t-2 pt-2">
                    <p class="mt-2 align-middle">{{data['amount'].toFixed(2)}} CHF</p>
                    <Link :href="route('commands.pay', data['id'])" method="put" class="ml-auto rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Serve</Link>
                </div>
            </div>

        </div>
    </div>

  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import Button from '@/Components/Button.vue'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        Button,
    },
    props: ['datas']
}
</script>
