<template>
  <div>
        <img :src="require('/src/img/logo2.png').default" />
    </div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
}
</script>
