<template>
    <div>

        <div>
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <jet-validation-errors/>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" v-model="form.password" required autocomplete="current-password" autofocus />
            </div>

            <div>
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </jet-button>
            </div>
        </form>
    </div>
</template>

<script>
    import LogoBranco from '@/Pages/public/Components/Icons/LogoBranco'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            LogoBranco,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors
        },

        data() {
            return {
                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.confirm'), {
                    onFinish: () => this.form.reset(),
                })
            }
        }
    }
</script>
