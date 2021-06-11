<template>
    <inertia-head>
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Merriweather:wght@200;400;700;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400&display=block"
        />
    </inertia-head>
    <div id="_website_">
        <navigation :atPage="atPage" />
        <messages :errors="$page.props.errors" :status="message" />

        <section id="_website_content_">
            <Header
                v-if="$page.props.user"
                :atPage="atPage"
                :atSubpage="atSubpage"
            />
            <slot></slot>
        </section>
    </div>
</template>

<script>
import Navigation from "@/Pages/admin/Components/Template/Navigation";
import Header from "@/Pages/admin/Components/Template/Header";
import Messages from "@/Layouts/Components/Messages";

export default {
    components: {
        Navigation,
        Header,
        Messages,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        };
    },
    methods: {
        switchToTeam(team) {
            this.$inertia.put(
                route("current-team.update"),
                {
                    team_id: team.id,
                },
                {
                    preserveState: false,
                }
            );
        },

        logout() {
            this.$inertia.post(route("logout"));
        },
    },
    props: {
        atPage: String,
        atSubpage: String,
        message: Object,
    },
};
</script>

<style lang="scss" scoped>
#_website_ {
    display: flex;
    flex-direction: column;

    height: 100vh;

    #_website_content_ {
        flex-grow: 1;

        background-color: $black;

        color: $white;
    }
}
</style>
