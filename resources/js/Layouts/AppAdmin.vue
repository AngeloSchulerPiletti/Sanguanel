<template>
    <div>
        <div>
            <nav>
                
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header">
                
            </header>

            <!-- Page Content -->
            <main>
                <slot name="main"></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import LogoPreto from "@/Pages/public/Components/Icons/LogoPreto";

    export default {
        components: {
            LogoPreto,
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
        }
    }
</script>

<style lang="scss" scoped>

</style>