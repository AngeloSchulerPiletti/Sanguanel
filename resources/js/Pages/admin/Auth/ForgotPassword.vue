<template>
    <inertia-head>
        <title>Esqueceu a Senha | Sanguanel</title>
        <meta name="description" content="Esqueceu da senha">
    </inertia-head>

    <app-admin :atPage="'login'">
        <section id="forgot_container">
            
            <form @submit.prevent="submit">
                <h4>Recuperação de senha</h4>
                <div id="information">
                    Digite seu email e enviaremos um link para você alterar sua senha.
                </div>
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

                <div class="options_container">
                    <jet-button
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Email Password Reset Link
                    </jet-button>
                    <inertia-link :href="route('login')">Voltar</inertia-link>
                </div>
            </form>
        </section>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";

import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";

export default {
    components: {
        JetButton,
        JetInput,
        JetLabel,
        AppAdmin,
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("password.email"));
        },
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/admin/Components/forms.scss";

#forgot_container {
    @include formLayout();
}
</style>
