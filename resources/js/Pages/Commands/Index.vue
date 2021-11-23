<template>
  <Head title="Commands" />

  <breeze-authenticated-layout>

    <template #header>
      <h2>
        Commands
      </h2>
    </template>

    <!-- source : https://tailwindcomponents.com/components/tables -->
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet"
    />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex mt-8 ml-5">
            <h1 class="text-4xl">Drink list</h1>
        </div>


        <div class="flex-none md:flex m-8 mx-auto justify-center">

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
    props: ['commands']
}
</script>
