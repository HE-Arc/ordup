<template>
	<div>
		<Link href="dashboard">
			<BreezeApplicationLogo
				class="w-20 h-20 fill-current text-gray-500"
			/>
		</Link>
	</div>
	<div class="hidden space-x-8 sm:my-3 sm:ml-10 sm:flex">
        <BreezeNavLink
			:href="route('home')"
			:active="route().current('Home')"
			v-show="!isConnected"
		>
            Home
		</BreezeNavLink>

        <BreezeNavLink
			:href="route('register')"
			:active="route().current('register')"
			v-show="!isConnected"
		>
        	Register
		</BreezeNavLink>

        <BreezeNavLink
			:href="route('login')"
			:active="route().current('login')"
			v-show="!isConnected"
		>
        	Login
		</BreezeNavLink>


		<BreezeNavLink
			:href="route('dashboard')"
			:active="route().current('dashboard')"
			v-show="isConnected"
		>
			Dashboard
		</BreezeNavLink>
		<BreezeNavLink
			:href="route('drinks')"
			:active="route().current('drinks')"
			:isConnected="isConnected"
            v-show="isConnected"
		>
			Drinks
		</BreezeNavLink>
		<BreezeNavLink
			:href="route('orders')"
			:active="route().current('orders')"
			:isConnected="isConnected"
            v-show="isConnected"
		>
			Orders
		</BreezeNavLink>
	</div>
</template>
<script>
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from '@inertiajs/inertia-vue3';


export default {
	components: {
		BreezeNavLink,
		BreezeApplicationLogo,
        Link,
	},
	props: ["href", "active"],
	computed: {
		classes() {
			return this.active
				? "inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition  duration-150 ease-in-out"
				: "inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out";
		},
	},
};
</script>
