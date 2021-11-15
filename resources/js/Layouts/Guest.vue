<template>
    <div class="bg-red-300">
        <BreezeNavBar :isConnected="false" />
    </div>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
        <div>
            <Link href="/">
                <BreezeApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>

<script>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import { Link } from '@inertiajs/inertia-vue3';
import BreezeNavBar from '@/Components/NavBar.vue'

export default {
    components: {
        BreezeApplicationLogo,
        Link,
        BreezeNavBar,
    }
}
</script>
