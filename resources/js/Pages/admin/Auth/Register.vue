<template>
    <app-admin :isHere="'register'">
        <section id="register_container">
        <validation-errors />

        <form @submit.prevent="submit">
            <h4>Bem-vindo!</h4>
            <div class="input_container">
                <jet-label for="name" value="Nome" />
                <jet-input id="name" type="text" v-model="form.name" required autofocus autocomplete="name" />
            </div>

            <div class="input_container">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" v-model="form.email" required />
            </div>

            <div class="input_container">
                <jet-label for="password" value="Senha" />
                <jet-input id="password" type="password" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="input_container">
                <jet-label for="password_confirmation" value="Repita a senha" />
                <jet-input id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="checkbox_container" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div>
                        <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                        <div>
                            Eu concordo com os <a target="_blank" :href="route('terms.show')">Termos de Serviço</a> e a <a target="_blank" :href="route('policy.show')">Política de Privacidade</a>
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="options_container" >
                <inertia-link :href="route('login')">
                    Já tem conta?
                </inertia-link>

                <jet-button :disabled="form.processing">
                    Cadastrar
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
    import JetCheckbox from "@/Jetstream/Checkbox";
    import JetLabel from '@/Jetstream/Label'
    import ValidationErrors from '@/Pages/admin/Components/Apendices/ValidationErrors'

    export default {
        components: {
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            ValidationErrors,
            AppAdmin,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                });
            }
        }
    }
</script>

<style lang="scss" scoped>
@import 'resources/css/sass/admin/Components/forms.scss';

#register_container{
    @include formLayout();

}
</style>
