<template>
    <inertia-head>
        <title>Recuperação de Senha | Sanguanel</title>
        <meta name="description" content="Recuperação de senha">
    </inertia-head>

    <app-admin>
        <section id="resetpassword_container">
        <form @submit.prevent="submit">
            <div class="input_container">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" v-model="form.email" required autofocus />
            </div>

            <div class="input_container">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="input_container">
                <jet-label for="password_confirmation" value="Confirm Password" />
                <jet-input id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="options_container">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reset Password
                </jet-button>
            </div>
        </form>
        </section>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";

    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'

    export default {
        components: {
            JetButton,
            JetInput,
            JetLabel,
            AppAdmin,
        },

        props: {
            email: String,
            token: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    token: this.token,
                    email: this.email,
                    password: '',
                    password_confirmation: '',
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.update'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
@import "resources/css/sass/admin/Components/forms.scss";

#resetpassword_container{
    @include formLayout();
}
</style>