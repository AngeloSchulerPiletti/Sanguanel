<template>
    <jet-action-section>
        <template #title> Autenticação em Dois Fatores </template>

        <template #description>
            Isso adiciona uma segurança maior à sua conta, mas não é necessário.
        </template>

        <template #content>
            <div
                id="introduction"
                :class="'enabled_' + (qrCode ? 'true' : 'false')"
            >
                <h3 v-if="twoFactorEnabled">
                    Você ativou a autenticação em dois fatores.
                </h3>

                <h3 v-else>Você não ativou a autenticação em dois fatores.</h3>

                <p>
                    Quando a autenticação de dois fatores está habilitada, você
                    será solicitado a fornecer um token aleatório seguro durante
                    a autenticação. Isso torna o login mais demorado, mas muito
                    mais seguro! Você pode recuperar esse token do aplicativo
                    Google Authenticator do seu telefone, é a nossa sugestão.
                </p>
            </div>

            <div v-if="twoFactorEnabled" id="code_container">
                <div v-if="qrCode">
                    <div>
                        <p>
                            A autenticação de dois fatores agora está
                            habilitada. Escaneie o seguinte QR-code usando o
                            autenticador ou câmera do seu telefone.
                        </p>
                    </div>

                    <div v-html="qrCode" id="qrCode"></div>
                </div>

                <div v-if="recoveryCodes.length > 0">
                    <div>
                        <p>
                            Armazene esses códigos de recuperação em um
                            gerenciador de senha seguro ou anote-os. Perdê-los é
                            um grande problema. Eles podem ser usados para
                            recuperar o acesso à sua conta se o seu dispositivo
                            de autenticação de dois fatores for perdido.
                        </p>
                    </div>

                    <div id="codes">
                        <div v-for="code in recoveryCodes" :key="code">
                            {{ code }}
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="actions_container" v-if="!twoFactorEnabled">
                    <jet-confirms-password
                        @confirmed="enableTwoFactorAuthentication"
                    >
                        <button class="btn" :disabled="enabling">
                            Habilitar
                        </button>
                    </jet-confirms-password>
                </div>

                <div class="actions_container" v-else>
                    <jet-confirms-password @confirmed="regenerateRecoveryCodes">
                        <button class="btn2" v-if="recoveryCodes.length > 0">
                            Alterar Códigos de Recuperação
                        </button>
                    </jet-confirms-password>

                    <jet-confirms-password @confirmed="showRecoveryCodes">
                        <button class="btn2" v-if="recoveryCodes.length === 0">
                            Mostrar Códigos de Recuperação
                        </button>
                    </jet-confirms-password>

                    <jet-confirms-password
                        @confirmed="disableTwoFactorAuthentication"
                    >
                        <button class="btn" :disabled="disabling">
                            Desabilitar
                        </button>
                    </jet-confirms-password>
                </div>
            </div>
        </template>
    </jet-action-section>
</template>

<script>
import JetActionSection from "@/Jetstream/ActionSection";
import JetButton from "@/Jetstream/Button";
import JetConfirmsPassword from "@/Jetstream/ConfirmsPassword";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
    components: {
        JetActionSection,
        JetButton,
        JetConfirmsPassword,
        JetDangerButton,
        JetSecondaryButton,
    },

    data() {
        return {
            enabling: false,
            disabling: false,

            qrCode: null,
            recoveryCodes: [],
        };
    },

    methods: {
        enableTwoFactorAuthentication() {
            this.enabling = true;

            this.$inertia.post(
                "/user/two-factor-authentication",
                {},
                {
                    preserveScroll: true,
                    onSuccess: () =>
                        Promise.all([
                            this.showQrCode(),
                            this.showRecoveryCodes(),
                        ]),
                    onFinish: () => (this.enabling = false),
                }
            );
        },

        showQrCode() {
            return axios.get("/user/two-factor-qr-code").then((response) => {
                this.qrCode = response.data.svg;
            });
        },

        showRecoveryCodes() {
            return axios
                .get("/user/two-factor-recovery-codes")
                .then((response) => {
                    this.recoveryCodes = response.data;
                });
        },

        regenerateRecoveryCodes() {
            axios.post("/user/two-factor-recovery-codes").then((response) => {
                this.showRecoveryCodes();
            });
        },

        disableTwoFactorAuthentication() {
            this.disabling = true;

            this.$inertia.delete("/user/two-factor-authentication", {
                preserveScroll: true,
                onSuccess: () => (this.disabling = false),
            });
        },
    },

    computed: {
        twoFactorEnabled() {
            return !this.enabling && this.$page.props.user.two_factor_enabled;
        },
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/admin/Components/profile";

@include profileShowStyle;
</style>
