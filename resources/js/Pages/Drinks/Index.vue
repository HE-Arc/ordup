<template>
  <Head title="Drinks" />

  <breeze-authenticated-layout>

    <template #header>
      <h2>
        Drinks
      </h2>
    </template>

    <!-- source : https://tailwindcomponents.com/components/tables -->

    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet"
    />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div id="drinkList" class="mt-8 mx-auto border-2 border-blue-400 rounded-lg p-3 h-54 max-w-3xl" style="display: none;">
            <div class="h-32 overflow-y-scroll w-full">
                <div v-for="drink in rows" :key="drink.key" class="flex bg-blue-200 lg:text-black mb-2 h-12">
                    <p class="font-bold ml-5 mt-3 w-72">{{drink.name}}</p>
                    <p class="mt-3 w-48">{{drink.price.toFixed(2)}} frs</p>
                    <p class="mt-3">nx</p>
                    <button @click="removeRow(drink.id)" class="text-red-500 hover:text-red-300 mt-2 mr-5 ml-auto">
                        <i class="material-icons-round text-base">delete_outline</i>
                    </button>
                </div>
            </div>
            <div class="flex mt-5">
                <button @click="cancelCommand()" class="ml-auto rounded bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                <button class="ml-3 rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit command</button>
            </div>
        </div>


        <div class="flex mt-8 ml-5">
            <h1 class="text-4xl">Drink list</h1>
            <button @click="addCommand()" id="addCommand" class="ml-auto rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create command</button>
        </div>


        <div class="flex-none md:flex m-8 mx-auto justify-center">
            <button v-for="drink in drinks" :key="drink.id"
                class="w-auto md:w-40 border-2 border-blue-400 rounded-lg m-4 bg-blue-100 hover:bg-blue-200"
                @click="addRow(drink)">
                <p class="m-2 text-xl text-center">{{drink.name}}</p>
                <p class="m-2 text-center">{{drink.price.toFixed(2)}} frs</p>
            </button>
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
    props: ['drinks'],

    data: function () {
        return {
            rows: [],
            commandStarted: false
        };
    },

    methods: {

        addCommand(){
            this.commandStarted = true;
            document.getElementById('addCommand').style.display = "none";
            document.getElementById('drinkList').style.display = "block";
        },

        cancelCommand(){
            this.rows = [];
            this.commandStarted = false;
            document.getElementById('addCommand').style.display = "block";
            document.getElementById('drinkList').style.display = "none";
        },

        addRow(drink){
            if(this.commandStarted) {
                this.rows.push(drink);
                this.$forceUpdate();
            }
        },

        removeRow(id){

        }
    }
}
</script>
