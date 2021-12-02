<!-- source https://dev.to/larainfo/tailwind-css-simple-pagination-4m3p -->

<template>
    <div class="flex items-center space-x-1">
        <Link v-for="(link, k) in links" :key="k"
            class="flex items-center px-4 py-2 text-gray-600 bg-gray-300 hover:bg-gray-400 rounded-md"
            :class="[link.url ? '' : 'disabled', link.active ? 'active' : '']"
            :href="link.url" v-html="link.label">
        </Link>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    components: {
        Link,
    },
    props: {
        links: Array,
    },
}
</script>
