<template>
    <inertia-head>
        <title>Configurações | Sanguanel</title>
    </inertia-head>

    <app-admin atPage="account" atSubpage="changes">
        <div>
            <div id="changes_container">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <update-profile-information-form :user="$page.props.user" />
                </div>

                <div v-if="$page.props.jetstream.canUpdatePassword">
                    <update-password-form />
                </div>

                <div
                    v-if="
                        $page.props.jetstream.canManageTwoFactorAuthentication
                    "
                >
                    <two-factor-authentication-form />
                </div>

                <logout-other-browser-sessions-form :sessions="sessions" />

                <template
                    v-if="$page.props.jetstream.hasAccountDeletionFeatures"
                >
                    <delete-user-form />
                </template>
            </div>
        </div>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";
import DeleteUserForm from "./DeleteUserForm";
import LogoutOtherBrowserSessionsForm from "./LogoutOtherBrowserSessionsForm";
import TwoFactorAuthenticationForm from "./TwoFactorAuthenticationForm";
import UpdatePasswordForm from "./UpdatePasswordForm";
import UpdateProfileInformationForm from "./UpdateProfileInformationForm";

export default {
    props: ["sessions"],

    components: {
        AppAdmin,
        DeleteUserForm,

        LogoutOtherBrowserSessionsForm,
        TwoFactorAuthenticationForm,
        UpdatePasswordForm,
        UpdateProfileInformationForm,
    },
};
</script>

<style lang="scss" scoped>
</style>
