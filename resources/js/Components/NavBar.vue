<template>
	<div class="flex h-16 bg-blue-800 text-blue-100 w-full">

		<div class="hidden sm:ml-5 sm:flex">

            <Link href="dashboard">
                <BreezeApplicationLogo
                class="w-10 h-10 mr-5 mt-1"
                v-show="isConnected"/>
            </Link>

			<BreezeNavLink
				class="pl-10 pr-10 border border-blue-800"
				:href="route('home')"
				:active="route().current('home')"
				v-show="!isConnected"
			>
				Home
			</BreezeNavLink>

			<BreezeNavLink
				class="pl-10 pr-10 border border-blue-800"
				:href="route('login')"
				:active="route().current('login')"
				v-show="!isConnected"
			>
				Login
			</BreezeNavLink>

			<BreezeNavLink
				class="pl-10 pr-10 border border-blue-800"
				:href="route('dashboard')"
				:active="route().current('dashboard')"
				v-show="isConnected"
			>
				Dashboard
			</BreezeNavLink>
			<BreezeNavLink
				class="pl-10 pr-10 border border-blue-800"
				:href="route('drinks.index')"
				:active="route().current('drinks.index')"
				v-show="isConnected"
			>
				Drinks
			</BreezeNavLink>
			<BreezeNavLink
				class="pl-10 pr-10 border border-blue-800"
				:href="route('commands.index')"
				:active="route().current('commands.index')"
				v-show="isConnected"
			>
				Orders
			</BreezeNavLink>


			<BreezeNavLink
				class="pl-10 pr-10 border border-blue-800"
				:href="route('admin')"
				:active="route().current('admin')"
				v-show="isConnected"
			>
				Zone admin
			</BreezeNavLink>

			<div class="ml-3 absolute right-0 top-4" v-if="isConnected">
				<BreezeDropdown align="right" width="48" class="mr-3 ml-auto">
					<template #trigger>
						<span class="inline-flex rounded-md">
							<button
								type="button"
								class="
									inline-flex
									items-center
									px-3
									py-2
									border border-transparent
									text-sm
									leading-4
									font-medium
									rounded-md
									text-gray-500
									bg-white
									hover:text-gray-700
									focus:outline-none
									transition
									ease-in-out
									duration-150
								"
							>
								{{ $page.props.auth.user.firstname }}
								<svg
									class="ml-2 -mr-0.5 h-4 w-4"
									xmlns="http://www.w3.org/2000/svg"
									viewBox="0 0 20 20"
									fill="currentColor"
								>
									<path
										fill-rule="evenodd"
										d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
										clip-rule="evenodd"
									/>
								</svg>
							</button>
						</span>
					</template>
					<template #content>
						<BreezeDropdownLink
							:href="route('logout')"
							method="post"
							as="button"
						>
							Log Out
						</BreezeDropdownLink>

                        <BreezeDropdownLink
							:href="route('password.update')"
							method="post"
							as="button"
						>
							Change password
						</BreezeDropdownLink>
					</template>
				</BreezeDropdown>
			</div>
		</div>
	</div>
</template>
<script>
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
	components: {
		BreezeDropdown,
		BreezeDropdownLink,
		BreezeNavLink,
		BreezeApplicationLogo,
		Link,
	},
	props: ["href", "active", "isConnected"],
	computed: {
		classes() {
			return this.active
				? "inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
				: "bg-blue-100 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out";
		},
	},
};
</script>
