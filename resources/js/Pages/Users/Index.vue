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
            <Link :href="route('users.create')" class="rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add a new employee</Link>
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
                        <th class="p-3 font-bold">Firstname</th>
                        <th class="p-3 text-left font-bold">Lastname</th>
                        <th class="p-3 text-left font-bold">Admin</th>
                        <th class="p-3 text-left font-bold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users.data" :key="user.id" class="bg-blue-200 lg:text-black" style="border-radius: 20px;">
                        <td class="p-3 text-base">{{user.firstname}}</td>
                        <td class="p-3 text-base">{{user.lastname}}</td>
                        <td v-if="user.is_admin" class="text-green-600 text-center">
                            <i class="material-icons-outlined">done</i>
                        </td>
                        <td v-else class="text-red-500 text-center">
                            <i class="material-icons-outlined">close</i>
                        </td>
                        <td class="p-3">
                            <Link :href="route('users.edit', user.id)" v-if="user.is_admin == 0 || user.id == auth_id" class="text-green-600 hover:text-green-500 mx-2">
                                <i class="material-icons-outlined text-base">edit</i>
                            </Link>
                            <button @click="destroy(user.id)" v-if="user.is_admin == 0" class="text-red-500 hover:text-red-300 ml-2">
                                <i class="material-icons-round text-base">delete_outline</i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="flex m-8 mx-auto justify-center">
            <Pagination :links="users.links" />
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
    props: ['users', 'auth_id'],

    methods: {
            destroy(id){
                Inertia.delete(route('users.destroy', id));
        },
    }
}
</script>
