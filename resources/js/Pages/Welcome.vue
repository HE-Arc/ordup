<template>
    <div class="text-6xl m-4 text-blue-800">Ordup !</div>
    <Head title="Welcome" />
    <div>
        <BreezeNavBar :isConnected="false" />
    </div>

     <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <!-- <Link href="/">
                <BreezeApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link> -->
            <div class="text-5xl">Beer ? Ordup !</div>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeNavBar from '@/Components/NavBar.vue'
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'


export default {
    components: {
      Head,
      Link,
      BreezeNavBar,
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
