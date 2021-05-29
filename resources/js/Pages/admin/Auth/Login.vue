<template>
    <app-admin :isHere="'login'">
        <validation-errors />

        <div v-if="status">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input
                    id="email"
                    type="email"
                    v-model="form.email"
                    required
                    autofocus
                />
            </div>

            <div>
                <jet-label for="password" value="Password" />
                <jet-input
                    id="password"
                    type="password"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />
            </div>

            <div>
                <label>
                    <jet-checkbox
                        name="remember"
                        v-model:checked="form.remember"
                    />
                    <span>Remember me</span>
                </label>
            </div>

            <div>
                <inertia-link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                >
                    Forgot your password?
                </inertia-link>

                <jet-button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </jet-button>
            </div>
        </form>
    </app-admin>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import ValidationErrors from "@/Pages/admin/Components/Apendices/ValidationErrors";
import AppAdmin from "@/Layouts/AppAdmin";

export default {
    components: {
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        ValidationErrors,
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

<style lang="scss" scoped></style>
