<template>
    <app-admin>
        <jet-validation-errors/>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" v-model="form.email" required autofocus />
            </div>

            <div>
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div>
                <jet-label for="password_confirmation" value="Confirm Password" />
                <jet-input id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div>
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reset Password
                </jet-button>
            </div>
        </form>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";

    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
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
