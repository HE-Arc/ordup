<template>
  <Head title="Drinks" />

  <breeze-authenticated-layout>

    <template #header>
      <h2>
        Drinks
      </h2>
    </template>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-8 ml-5">
            <h1 class="text-4xl">Drink list</h1>
        </div>


        <div class="flex-none md:flex m-8 mx-auto justify-center">
            <div v-for="drink in drinks" :key="drink.id"
                class="w-auto md:w-40 border-2 border-blue-400 rounded-lg m-4 bg-blue-100">
                <p class="m-2 text-xl text-center">{{drink.name}}</p>
                <p class="m-2 text-center">{{drink.price.toFixed(2)}} frs</p>
            </div>
        </div>
    </div>

  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
    },
    props: ['drinks'],

    methods: {
            destroy(id){
                Inertia.delete(route('drinks.destroy', id));
        },
    }
}
</script>
