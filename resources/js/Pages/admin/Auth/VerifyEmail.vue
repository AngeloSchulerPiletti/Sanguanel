<template>
    <inertia-head>
        <title>Verificação de Email | Sanguanel</title>
        <meta name="description" content="Verificação de email.">
    </inertia-head>

    <app-admin>

        <div>
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        <div v-if="verificationLinkSent" >
            A new verification link has been sent to the email address you provided during registration.
        </div>

        <form @submit.prevent="submit">
            <div>
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Resend Verification Email
                </jet-button>

                <inertia-link :href="route('logout')" method="post" as="button">Log Out</inertia-link>
            </div>
        </form>
    </app-admin>
</template>

<script>
    import JetButton from '@/Jetstream/Button'
import AppAdmin from "@/Layouts/AppAdmin";


    export default {
        components: {
            JetButton,
                AppAdmin,
        },

        props: {
            status: String
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
