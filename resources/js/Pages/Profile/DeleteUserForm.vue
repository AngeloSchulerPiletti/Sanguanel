<template>
    <jet-action-section>
        <template #title> Deletar Conta </template>

        <template #description>
            Deletar sua conta permanentemente. <br />Cuidado, essa ação é
            irreversível!
        </template>

        <template #content>
            <div id="introduction">
                <p>
                    Uma vez deletada sua conta, não há como voltar atrás. Tudo
                    relacionado à sua conta irá desaparecer.
                </p>
            </div>

            <div>
                <button class="btn3" @click="confirmUserDeletion">
                    Deletar Conta
                </button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <jet-dialog-modal
                :show="confirmingUserDeletion"
                @close="closeModal"
            >
                <template #title> Deletar Conta </template>

                <template #content>
                    <p>
                        Tem certeza que deseja continuar? Uma vez deletada sua
                        conta, não há como voltar atrás. Tudo relacionado à sua
                        conta irá desaparecer.
                    </p>

                    <div class="input">
                        <jet-input
                            type="password"
                            placeholder="Senha"
                            ref="password"
                            v-model="form.password"
                            @keyup.enter="deleteUser"
                        />

                        <jet-input-error :message="form.errors.password" />
                    </div>
                </template>

                <template #footer>
                    <div class="actions_container">
                        <button class="btn" @click="closeModal">
                            Cancelar
                        </button>

                        <button
                            class="btn3"
                            @click="deleteUser"
                            :disabled="form.processing"
                        >
                            Deletar Conta
                        </button>
                    </div>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
import JetActionSection from "@/Jetstream/ActionSection";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
    components: {
        JetActionSection,
        JetDangerButton,
        JetDialogModal,
        JetInput,
        JetInputError,
        JetSecondaryButton,
    },

    data() {
        return {
            confirmingUserDeletion: false,

            form: this.$inertia.form({
                password: "",
            }),
        };
    },

    methods: {
        confirmUserDeletion() {
            this.confirmingUserDeletion = true;

            setTimeout(() => this.$refs.password.focus(), 250);
        },

        deleteUser() {
            this.form.delete(route("current-user.destroy"), {
                preserveScroll: true,
                onSuccess: () => this.closeModal(),
                onError: () => this.$refs.password.focus(),
                onFinish: () => this.form.reset(),
            });
        },

        closeModal() {
            this.confirmingUserDeletion = false;

            this.form.reset();
        },
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/admin/Components/profile";

@include profileShowStyle;
</style>
