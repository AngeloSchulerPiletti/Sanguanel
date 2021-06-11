<template>
    <inertia-head>
        <title>Confirmação de Senha | Sanguanel</title>
        <meta name="description" content="Confirmação de senha">
    </inertia-head>

    <app-admin>
        <section id="confirmation_container">
            <form @submit.prevent="submit">
                <div id="information">
                    Esta área é restrita, por favor preencha suas credenciais
                    antes de prosseguir.
                </div>
                <div class="input_container">
                    <jet-label for="password" value="Password" />
                    <jet-input
                        id="password"
                        type="password"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        autofocus
                    />
                </div>

                <div class="options_container">
                    <jet-button
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Confirm
                    </jet-button>
                </div>
            </form>
        </section>
    </app-admin>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import AppAdmin from "@/Layouts/AppAdmin";

export default {
    components: {
        JetButton,
        JetInput,
        JetLabel,
        AppAdmin,
    },

    data() {
        return {
            form: this.$inertia.form({
                password: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("password.confirm"), {
                onFinish: () => this.form.reset(),
            });
        },
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/admin/Components/forms.scss";

#confirmation_container{
    @include formLayout();
}
</style>