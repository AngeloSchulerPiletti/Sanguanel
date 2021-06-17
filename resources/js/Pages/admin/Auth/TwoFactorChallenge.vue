<template>
    <inertia-head>
        <title>Autenticação | Sanguanel</title>
        <meta name="description" content="Autenticação em dois fatores.">
    </inertia-head>

    <app-admin atPage="login">
        <section id="twofactor_container">
            <h4>Autenticação em Dois Fatores</h4>
            <div id="introduction">
                <template v-if="!recovery">
                    <p>
                        Por favor, confirme sua identidade inserindo o código
                        provido pelo seu aplicativo de autenticação.
                    </p>
                </template>

                <template v-else>
                    <p>
                        Por favor, confirme sua identidade inserindo um dos
                        códigos de recuperação fornecidos durante a habilitação
                        da autenticação em dois fatores.
                    </p>
                </template>
            </div>

            <form @submit.prevent="submit">
                <div v-if="!recovery" class="input_container">
                    <jet-label for="code" value="Código" />
                    <jet-input
                        ref="code"
                        id="code"
                        type="text"
                        inputmode="numeric"
                        v-model="form.code"
                        autofocus
                        autocomplete="one-time-code"
                    />
                </div>

                <div class="input_container" v-else>
                    <jet-label for="recovery_code" value="Código de Recuperação" />
                    <jet-input
                        ref="recovery_code"
                        id="recovery_code"
                        type="text"
                        v-model="form.recovery_code"
                        autocomplete="one-time-code"
                    />
                </div>

                <div class="actions_container">
                    <button class="btn2" type="button" @click.prevent="toggleRecovery">
                        <template v-if="!recovery">
                            Usar Código de Recuperação
                        </template>

                        <template v-else> Usar Código de Autenticação </template>
                    </button>

                    <button
                        class="btn"
                        :disabled="form.processing"
                    >
                        Entrar
                    </button>
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

    data() {
        return {
            recovery: false,
            form: this.$inertia.form({
                code: "",
                recovery_code: "",
            }),
        };
    },

    methods: {
        toggleRecovery() {
            this.recovery ^= true;

            this.$nextTick(() => {
                if (this.recovery) {
                    this.$refs.recovery_code.focus();
                    this.form.code = "";
                } else {
                    this.$refs.code.focus();
                    this.form.recovery_code = "";
                }
            });
        },

        submit() {
            this.form.post(this.route("two-factor.login"));
        },
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/admin/Components/forms.scss";

#twofactor_container {
    @include formLayout();
}
</style>
