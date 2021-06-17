<template>
    <span>
        <span @click="startConfirmingPassword">
            <slot />
        </span>

        <jet-dialog-modal :show="confirmingPassword" @close="closeModal">
            <template #title>
                <h3>{{ title }}</h3>
            </template>

            <template #content>
                <p>{{ content }}</p>

                <div class="input">
                    <jet-input
                        type="password"
                        placeholder="Senha"
                        ref="password"
                        v-model="form.password"
                        @keyup.enter="confirmPassword"
                    />

                    <jet-input-error :message="form.error" />
                </div>
            </template>

            <template #footer>
                <div class="actions_container">
                    <button class="btn2" @click="closeModal">Cancelar</button>

                    <button
                        class="btn"
                        @click="confirmPassword"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        {{ button }}
                    </button>
                </div>
            </template>
        </jet-dialog-modal>
    </span>
</template>

<script>
import JetButton from "./Button";
import JetDialogModal from "./DialogModal";
import JetInput from "./Input";
import JetInputError from "./InputError";
import JetSecondaryButton from "./SecondaryButton";

export default {
    emits: ["confirmed"],

    props: {
        title: {
            default: "Confirme sua Senha",
        },
        content: {
            default: "Para sua segurança, confirme sua senha.",
        },
        button: {
            default: "Confirmar",
        },
    },

    components: {
        JetButton,
        JetDialogModal,
        JetInput,
        JetInputError,
        JetSecondaryButton,
    },

    data() {
        return {
            confirmingPassword: false,
            form: {
                password: "",
                error: "",
            },
        };
    },

    methods: {
        startConfirmingPassword() {
            axios.get(route("password.confirmation")).then((response) => {
                if (response.data.confirmed) {
                    this.$emit("confirmed");
                } else {
                    this.confirmingPassword = true;

                    setTimeout(() => this.$refs.password.focus(), 250);
                }
            });
        },

        confirmPassword() {
            this.form.processing = true;

            axios
                .post(route("password.confirm"), {
                    password: this.form.password,
                })
                .then(() => {
                    this.form.processing = false;
                    this.closeModal();
                    this.$nextTick(() => this.$emit("confirmed"));
                })
                .catch((error) => {
                    this.form.processing = false;
                    this.form.error = error.response.data.errors.password[0];
                    this.$refs.password.focus();
                });
        },

        closeModal() {
            this.confirmingPassword = false;
            this.form.password = "";
            this.form.error = "";
        },
    },
};
</script>

<style lang="scss" scoped>
p {
    @include Fonte1_SS;
    font-size: 1.2vw;
}
.btn {
    @include button1();
}
.btn2 {
    @include button2();
}
.actions_container {
    display: flex;
    gap: 1vw;
}
.input {
    input {
        border-radius: 0.3vw;
        border: 1px solid $yellow;
        outline: none;
        box-shadow: 0 0 0 0;

        margin-top: 1vw;

        font-size: 1.2vw;
    }
}
</style>
