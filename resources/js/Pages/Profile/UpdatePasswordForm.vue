<template>
    <jet-form-section @submitted="updatePassword">
        <template #title> Alterar Senha </template>

        <template #description>
            Garanta que sua conta tenha uma senha longa e com diversos caracteres para mantê-la segura.
        </template>

        <template #form>
            <div class="sequential_input">
                <div class="input">
                    <jet-label
                        for="current_password"
                        value="Current Password"
                    />
                    <jet-input
                        id="current_password"
                        type="password"
                        class=""
                        v-model="form.current_password"
                        ref="current_password"
                        autocomplete="current-password"
                    />
                </div>

                <div class="input">
                    <jet-label for="password" value="New Password" />
                    <jet-input
                        id="password"
                        type="password"
                        class=""
                        v-model="form.password"
                        ref="password"
                        autocomplete="new-password"
                    />
                </div>

                <div class="input">
                    <jet-label
                        for="password_confirmation"
                        value="Confirm Password"
                    />
                    <jet-input
                        id="password_confirmation"
                        type="password"
                        class=""
                        v-model="form.password_confirmation"
                        autocomplete="new-password"
                    />
                </div>
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Salvo
            </jet-action-message>

            <button class="btn" :disabled="form.processing">Salvar</button>
        </template>
    </jet-form-section>
</template>

<script>
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";

export default {
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
    },

    data() {
        return {
            form: this.$inertia.form({
                current_password: "",
                password: "",
                password_confirmation: "",
            }),
        };
    },

    methods: {
        updatePassword() {
            this.form.put(route("user-password.update"), {
                //errorBag: 'updatePassword',
                preserveScroll: true,
                onSuccess: () => this.form.reset(),
                onError: () => {
                    if (this.form.errors.password) {
                        this.form.reset("password", "password_confirmation");
                        this.$refs.password.focus();
                    }

                    if (this.form.errors.current_password) {
                        this.form.reset("current_password");
                        this.$refs.current_password.focus();
                    }
                },
            });
        },
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/admin/Components/profile";

@include profileShowStyle;


 /*+-----------------------------------------------------+
  |                RESPONSIVIDADE                                  |
  +-----------------------------------------------------+*/
@media (max-width: 1300px) {
    //
}
@media (max-width: 1100px) {
@include profileShowStyle2;
}
</style>
