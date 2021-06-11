<template>
    <inertia-head>
        <title>Login | Sanguanel</title>
        <meta name="description" content="Página de login do ediotrial">
    </inertia-head>

    <app-admin atPage="login">
        <section id="login_container">

            <form @submit.prevent="submit">
                <h4>Bem-vindo!</h4>
                <div class="input_container">
                    <jet-label for="email" value="Email" />
                    <jet-input
                        id="email"
                        type="email"
                        v-model="form.email"
                        required
                        autofocus
                    />
                </div>

                <div class="input_container">
                    <jet-label for="password" value="Senha" />
                    <jet-input
                        id="password"
                        type="password"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />
                </div>

                <div class="checkbox_container">
                    <label>
                        <jet-checkbox
                            name="remember"
                            v-model:checked="form.remember"
                        />
                        <span>Lembre de mim</span>
                    </label>
                </div>

                <div class="options_container">
                    <inertia-link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                    >
                        Esqueceu a senha?
                    </inertia-link>

                    <jet-button :disabled="form.processing">
                        Entrar
                    </jet-button>
                </div>
            </form>
        </section>
    </app-admin>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import AppAdmin from "@/Layouts/AppAdmin";

export default {
    components: {
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        AppAdmin,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                remember: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form
                .transform((data) => ({
                    ...data,
                    remember: this.form.remember ? "on" : "",
                }))
                .post(this.route("login"), {
                    onFinish: () => this.form.reset("password"),
                });
        },
    },
};
</script>

<style lang="scss" scoped>
@import 'resources/css/sass/admin/Components/forms.scss';

#login_container {
    @include formLayout();
}
</style>
