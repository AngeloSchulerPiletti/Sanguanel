<template>
    <app-admin>

        <div>
            <template v-if="! recovery">
                Please confirm access to your account by entering the authentication code provided by your authenticator application.
            </template>

            <template v-else>
                Please confirm access to your account by entering one of your emergency recovery codes.
            </template>
        </div>

        <jet-validation-errors/>

        <form @submit.prevent="submit">
            <div v-if="! recovery">
                <jet-label for="code" value="Code" />
                <jet-input ref="code" id="code" type="text" inputmode="numeric" v-model="form.code" autofocus autocomplete="one-time-code" />
            </div>

            <div v-else>
                <jet-label for="recovery_code" value="Recovery Code" />
                <jet-input ref="recovery_code" id="recovery_code" type="text" v-model="form.recovery_code" autocomplete="one-time-code" />
            </div>

            <div>
                <button type="button" @click.prevent="toggleRecovery">
                    <template v-if="! recovery">
                        Use a recovery code
                    </template>

                    <template v-else>
                        Use an authentication code
                    </template>
                </button>

                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
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
    import JetValidationErrors from '@/Pages/admin/Components/Apendices/ValidationErrors'

    export default {
        components: {
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
            AppAdmin,
        },

        data() {
            return {
                recovery: false,
                form: this.$inertia.form({
                    code: '',
                    recovery_code: '',
                })
            }
        },

        methods: {
            toggleRecovery() {
                this.recovery ^= true

                this.$nextTick(() => {
                    if (this.recovery) {
                        this.$refs.recovery_code.focus()
                        this.form.code = '';
                    } else {
                        this.$refs.code.focus()
                        this.form.recovery_code = ''
                    }
                })
            },

            submit() {
                this.form.post(this.route('two-factor.login'))
            }
        }
    }
</script>
