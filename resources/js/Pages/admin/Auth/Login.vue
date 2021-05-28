<template>
    <div>

        <jet-validation-errors />

        <div v-if="status">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" v-model="form.email" required autofocus />
            </div>

            <div >
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div>
                <label >
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span>Remember me</span>
                </label>
            </div>

            <div>
                <inertia-link v-if="canResetPassword" :href="route('password.request')" >
                    Forgot your password?
                </inertia-link>

                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </jet-button>
            </div>
        </form>
    </div>
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>


<style lang="scss" scoped>

</style>