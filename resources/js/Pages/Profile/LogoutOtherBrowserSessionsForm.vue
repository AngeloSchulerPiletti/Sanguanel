<template>
    <jet-action-section>
        <template #title> Suas Sessões </template>

        <template #description>
            Caso você tenha se conectado em outros dispositivos ou navegadores,
            aqui você terá acesso a essas informações e poderá deslogar dessas
            outras sessões.
        </template>

        <template #content>
            <div class="introduction">
                <p>
                    Se necessário, você pode sair de todas as outras sessões
                    ativas de sua conta. Algumas de suas sessões recentes estão
                    listadas abaixo; no entanto, esta lista pode não ser
                    completa. Se você acha que sua conta foi comprometida, você
                    deve atualizar sua senha.
                </p>
            </div>

            <!-- Other Browser Sessions -->
            <div id="sessions_list" v-if="sessions.length > 0">
                <div
                    class="session_container"
                    v-for="(session, i) in sessions"
                    :key="i"
                >
                    <div class="device_icon">
                        <svg
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="w-8 h-8 text-gray-500"
                            v-if="session.agent.is_desktop"
                        >
                            <path
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                            ></path>
                        </svg>

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="w-8 h-8 text-gray-500"
                            v-else
                        >
                            <path d="M0 0h24v24H0z" stroke="none"></path>
                            <rect
                                x="7"
                                y="4"
                                width="10"
                                height="16"
                                rx="1"
                            ></rect>
                            <path d="M11 5h2M12 17v.01"></path>
                        </svg>
                    </div>

                    <div>
                        <div class="infos1">
                            {{ session.agent.platform }} -
                            {{ session.agent.browser }}
                        </div>

                        <div class="infos2">
                            <div>
                                {{ session.ip_address }},

                                <span
                                    id="this_activity"
                                    v-if="session.is_current_device"
                                    >Este dispositivo</span
                                >
                                <span class="last_activity" v-else
                                    >Última atividade
                                    {{ session.last_active }}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <button class="btn" @click="confirmLogout">
                    Sair de outras sessões
                </button>

                <jet-action-message :on="form.recentlySuccessful">
                    Logout com suceeso
                </jet-action-message>
            </div>

            <!-- Log Out Other Devices Confirmation Modal -->
            <jet-dialog-modal :show="confirmingLogout" @close="closeModal">
                <template #title> Sair de Outras Sessões </template>

                <template #content>
                    <p>
                        Insira sua senha para confirmar que você deseja deslogar
                        de todas as suas outras sessões ativas.
                    </p>

                    <div class="input">
                        <jet-input
                            type="password"
                            placeholder="Senha"
                            ref="password"
                            v-model="form.password"
                            @keyup.enter="logoutOtherBrowserSessions"
                        />

                        <jet-input-error :message="form.errors.password" />
                    </div>
                </template>

                <template #footer>
                    <div class="actions_container">
                        <button class="btn2" @click="closeModal">
                            Cancelar
                        </button>

                        <button
                            class="btn3"
                            @click="logoutOtherBrowserSessions"
                            :disabled="form.processing"
                        >
                            Sair de outras sessões
                        </button>
                    </div>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetActionSection from "@/Jetstream/ActionSection";
import JetButton from "@/Jetstream/Button";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
    props: ["sessions"],

    components: {
        JetActionMessage,
        JetActionSection,
        JetButton,
        JetDialogModal,
        JetInput,
        JetInputError,
        JetSecondaryButton,
    },

    data() {
        return {
            confirmingLogout: false,

            form: this.$inertia.form({
                password: "",
            }),
        };
    },

    methods: {
        confirmLogout() {
            this.confirmingLogout = true;

            setTimeout(() => this.$refs.password.focus(), 250);
        },

        logoutOtherBrowserSessions() {
            this.form.delete(route("other-browser-sessions.destroy"), {
                preserveScroll: true,
                onSuccess: () => this.closeModal(),
                onError: () => this.$refs.password.focus(),
                onFinish: () => this.form.reset(),
            });
        },

        closeModal() {
            this.confirmingLogout = false;

            this.form.reset();
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
