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
        <div id="drinkList" v-if="commandStarted" class="mt-8 mx-auto border-2 border-blue-400 rounded-lg p-3 h-54 max-w-3xl">
            <div class="h-32 overflow-y-scroll w-full">
                <div v-for="(item, id) in rows" :key="id" class="flex bg-blue-200 lg:text-black mb-2 h-12">
                    <p class="font-bold ml-5 mt-3 w-72">{{item.drink.name}}</p>
                    <p class="mt-3 w-48">{{item.drink.price.toFixed(2)}} frs</p>
                    <p class="mt-3">{{item.quantity}}x</p>
                    <button @click="removeRow(id)" class="text-red-500 hover:text-red-300 mt-2 mr-5 ml-auto">
                        <i class="material-icons-round text-base">delete_outline</i>
                    </button>
                </div>
            </div>
            <div class="flex mt-5">
                <select @change="changeTable()" v-model="selected" name="bartable_select" id="bartable_select" class="border rounded shadow py-1 pr-8 pl-3 w-8/12 sm:w-max">
                    <option v-for="bartable in bartables" v-bind:value="{ id: bartable.id, text: bartable.name }" :key="bartable.id">
                        {{ bartable.name }}
                    </option>
                </select>
                <button @click="cancelCommand()" class="ml-auto rounded bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                <Link v-if="canSubmit()" :href="route('commands.store')" method="post" :data="{ dict: rows, bartable: bartable }" class="ml-3 rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit command</Link>
            </div>
        </div>


        <div class="flex mt-8 ml-5">
            <h1 class="text-4xl">Drink list</h1>
            <button @click="addCommand()" v-if="!commandStarted" id="addCommand" class="ml-auto rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create command</button>
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
    props: ['drinks', 'bartables'],

    data: function () {
        return {
            rows: {},
            bartable: 0,
            commandStarted: false,
            selected: '',
        };
    },

    methods: {

        addCommand(){
            this.commandStarted = true;
            this.changeTable();
        },

        cancelCommand(){
            this.rows = {};
            this.bartable = 0;
            this.commandStarted = false;
        },

        changeTable(){
            this.bartable = this.selected.id;
        },

        addRow(drink){
            if(this.commandStarted) {

                if (drink.id in this.rows) {
                    this.rows[drink.id]['quantity'] += 1;
                }
                else {
                    var dict = {'drink': drink, 'quantity': 1};
                    this.rows[drink.id] = dict;
                }

                this.$forceUpdate();
            }
        },

        removeRow(id){
            if(id in this.rows) {
                delete this.rows[id];
                this.$forceUpdate();
            }
        },

        canSubmit(){
            return Object.keys(this.rows).length > 0;
        }
    }
}
</script>
