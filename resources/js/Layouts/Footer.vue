<template>
    <footer class="bg-blue-800 rounded-t-lg">
        <div class="py-2 flex flex-col justify-center items-center">
            <h1 class="text-4xl">Ordup !</h1>
            <Link href="/">
                <BreezeApplicationLogo class="w-14 h-14 my-2"/>
            </Link>
            <p tabindex="0" class="focus:outline-none mt-4 text-xs lg:text-sm leading-none text-blue-100">2021 HE-Arc Ingenierie. All Rights Reserved.</p>
            <p tabindex="0" class="focus:outline-none text-xs lg:text-sm leading-none text-blue-100">William Bikuta, Gabriel Fasano & Milán Cerviño</p>
        </div>
    </footer>
</template>

<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeApplicationLogo,
        Link,
    },
}
</script>
