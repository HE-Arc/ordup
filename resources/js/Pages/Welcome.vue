<template>
    <Head title="Welcome" />
    <div class="hidden sm:block">
        <BreezeNavBar :isConnected="false" />
    </div>

    <div class="block sm:hidden">
        <div class="flex h-16 bg-blue-800 text-blue-100 w-full">
            <Link
				class="ml-5 mt-5 text-xl"
				:href="route('login')"
			>
            Login
            </Link>
        </div>
    </div>

     <div class="flex flex-col mt-40 sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <Link href="/">
                <BreezeApplicationLogo class="w-20 h-20 mb-20 mx-auto"/>
            </Link>

            <div class="text-5xl">Beer ? Ordup !</div>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeNavBar from '@/Components/NavBar.vue';
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'


export default {
    components: {
      Head,
      Link,
      BreezeNavBar,
      BreezeNavLink,
      BreezeApplicationLogo

    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
}
</script>
