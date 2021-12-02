<template>
    <Link :href="href" :class="classes" :isConnected="isConnected">
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },

    props: ['href', 'active', 'isConnected'],

    computed: {
        classes() {
            return this.active
                ? 'inline-flex items-center text-black border-none bg-yellow-100'
                : 'inline-flex items-center'
        },
    }
}
</script>
