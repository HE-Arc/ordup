<template>
  <div class="flex h-16 bg-red-800 text-yellow-100 w-full">
    <!-- <div>
      <Link href="dashboard">
        <BreezeApplicationLogo class="w-10 h-10"/>
      </Link>
    </div> -->
    <div class="hidden sm:ml-10 sm:flex">
      <BreezeNavLink class="pl-10 pr-10 border border-red-800"
        :href="route('home')"
        :active="route().current('home')"
        v-show="!isConnected"
      >
        Home
      </BreezeNavLink>

      <!-- <BreezeNavLink class="pl-10 pr-10 border border-red-800"
        :href="route('register')"
        :active="route().current('register')"
        v-show="!isConnected"
      >
        Register
      </BreezeNavLink> -->

      <BreezeNavLink class="pl-10 pr-10 border border-red-800"
        :href="route('login')"
        :active="route().current('login')"
        v-show="!isConnected"
      >
        Login
      </BreezeNavLink>

      <BreezeNavLink class="pl-10 pr-10 border border-red-800"
        :href="route('dashboard')"
        :active="route().current('dashboard')"
        v-show="isConnected"
      >
        Dashboard
      </BreezeNavLink>
      <BreezeNavLink class="pl-10 pr-10 border border-red-800"
        :href="route('drinks.index')"
        :active="route().current('drinks.index')"
        v-show="isConnected"
      >
        Drinks
      </BreezeNavLink>
      <BreezeNavLink class="pl-10 pr-10 border border-red-800"
        :href="route('commands.index')"
        :active="route().current('commands.index')"
        v-show="isConnected"
      >
        Orders
      </BreezeNavLink>
    </div>
  </div>
</template>
<script>
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    BreezeNavLink,
    BreezeApplicationLogo,
    Link,
  },
  props: ["href", "active", "isConnected"],
  computed: {
    classes() {
      return this.active
        ? "inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition  duration-150 ease-in-out"
        : "bg-yellow-100 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out";
    },
  },
};
</script>
