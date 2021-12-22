<template>
    <Head title="Email Verification" />

    <div class="mb-4 text-sm text-gray-600">
        Bonjour et bienvenue dans l'équipe ! Un compte a été crée à votre nom. Cliquez sur le bouton ci-dessous pour recevoir un email qui vous donnera accès à lapplication.
    </div>

    <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent" >
        Le lien d'accès a été envoyé par mail.
    </div>

    <form @submit.prevent="submit">
        <div class="mt-4 flex items-center justify-between">
            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Envoyer le lien d'accès
            </BreezeButton>

            <Link :href="route('logout')" method="post" as="button" class="underline text-sm text-gray-600 hover:text-gray-900">Log Out</Link>
        </div>
    </form>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        Head,
        Link,
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form()
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('verification.send'))
        },
    },

    computed: {
        verificationLinkSent() {
            return this.status === 'verification-link-sent';
        }
    }
}
</script>
