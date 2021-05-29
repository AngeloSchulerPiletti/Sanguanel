<template>
    <div id="_website_">
        <navigation :atPage="isHere"/>

        <section id="_website_content_">
            <Header/>
            <slot></slot>
        </section>
    </div>
</template>

<script>
    import Navigation from "@/Pages/admin/Components/Template/Navigation";
    import Header from "@/Pages/admin/Components/Template/Header";



    export default {
        components: {
            Navigation,
            Header
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },
        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        },
        props:{
            isHere: String,
        }
    }
</script>

<style lang="scss" scoped>

</style>