<template>
    <div>
        <div>

            <!-- Page Heading -->
            <nav class="border-gray-100">
                <!-- Primary Navigation Menu -->
                    <!-- Navigation Links -->
                    <div class="flex">
                        <BreezeNavBar :isConnected="true" />
                    </div>
                        <!-- Hamburger -->
                        <div class="mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <BreezeResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </BreezeResponsiveNavLink>
                        <BreezeResponsiveNavLink :href="route('drinks.index')" :active="route().current('drinks.index')">
                            Drinks
                        </BreezeResponsiveNavLink>
                        <BreezeResponsiveNavLink :href="route('commands.index')" :active="route().current('commands.index')">
                            Orders
                        </BreezeResponsiveNavLink>
                         <BreezeResponsiveNavLink :href="route('admin')" :active="route().current('admin')">
                            Zone admin
                        </BreezeResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.firstname }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </BreezeResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main style="min-height: calc(100vh - 280px);">
                <slot />
            </main>

            <BreezeFooter/>
        </div>
    </div>
</template>

<script>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import BreezeNavLink from '@/Components/NavLink.vue'
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import { Link } from '@inertiajs/inertia-vue3';
import BreezeNavBar from '@/Components/NavBar.vue'
import BreezeFooter from '@/Layouts/Footer.vue'

export default {
    components: {
        BreezeApplicationLogo,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        Link,
        BreezeNavBar,
        BreezeFooter,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        }
    },
}
</script>
