<template>
  <Head title="Drinks" />

  <breeze-authenticated-layout>


    <template #header>
      <h2>
        Drinks
      </h2>
    </template>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- source : https://v1.tailwindcss.com/components/alerts -->
        <div  v-if="success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success !   </strong>
            <span class="block sm:inline">{{success}}</span>
        </div>

        <div class="mt-8 ml-5">
            <Link :href="route('drinks.create')" class="rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add a drink</Link>
        </div>

        <!-- source : https://tailwindcomponents.com/components/tables -->

        <link
            href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
            rel="stylesheet"
        />

        <div class="flex m-8 mx-auto justify-center">
            <table class="table border-separate space-y-6 text-sm" style="border-spacing: 0 15px;">
                <thead class="bg-blue-500 text-white">
                    <tr style="border-radius: 20px;">
                        <th class="p-3 font-bold">Name</th>
                        <th class="p-3 text-left font-bold">Price</th>
                        <th class="p-3 text-left font-bold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="drink in drinks.data" :key="drink.id" class="bg-blue-200 lg:text-black" style="border-radius: 20px;">
                        <td class="p-3 font-bold text-lg capitalize">{{drink.name}}</td>
                        <td class="p-3 text-base">{{drink.price.toFixed(2)}} frs</td>
                        <td class="p-3">
                            <Link :href="route('drinks.edit', drink.id)" class="text-green-600 hover:text-green-500 mx-2">
                                <i class="material-icons-outlined text-base">edit</i>
                            </Link>
                            <button @click="destroy(drink.id)" class="text-red-500 hover:text-red-300 ml-2">
                                <i class="material-icons-round text-base">delete_outline</i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="flex m-8 mx-auto justify-center">
            <Pagination :links="drinks.links" />
        </div>
    </div>

  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Pagination from '@/Components/Pagination.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Pagination,
        Head,
        Link,
    },
    props: ['drinks', 'success'],

    methods: {
            destroy(id){
                Inertia.delete(route('drinks.destroy', id));
        },
    }
}
</script>
