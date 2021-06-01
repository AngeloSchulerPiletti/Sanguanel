<template>
    <nav>
        <div class="left">
            <inertia-link href="/"><logo-preto id="logo" /></inertia-link>
        </div>
        <div class="center">
            <ul>
                <li v-if="!$page.props.user" :class="li.register">
                    <inertia-link href="/register">Registrar</inertia-link>
                </li>
                <li v-if="!$page.props.user" :class="li.login">
                    <inertia-link href="/login">Entrar</inertia-link>
                </li>
                <li v-if="$page.props.user" :class="li.dashboard">
                    <inertia-link href="/dashboard">Conta</inertia-link>
                </li>
                <li v-if="$page.props.user && $page.props.user.adminLevel > 2" :class="li.admin">
                    <inertia-link href="/admin">Administrador</inertia-link>
                </li>
            </ul>
        </div>

        <!-- Drop Menu -->
        <div v-if="$page.props.user" class="right">
            <dropmenu :links="links"/>
        </div> 
    </nav>
</template>

<script>
import LogoPreto from "@/Pages/admin/Components/Icons/LogoPreto";
import Dropmenu from "@/Pages/admin/Components/Apendices/Dropmenu";

export default {
    data() {
        return {
            li: {
                login: "",
                register: "",
                dashboard: "",
                admin: "",
            },
            links:{
                // "Conta": "/dashboard",
            },
        };
    },
    components: {
        LogoPreto,
        Dropmenu,
    },
    props: {
        atPage: String,
    },
    methods: {
    },
    mounted() {
        this.li[this.atPage] = "actual";
    },
};
</script>

<style lang="scss" scoped>

@mixin menuSelection($color) {
    border-bottom: 3px solid $color;
}

nav {
    display: grid;
    grid-template-columns: 1fr 4fr 1fr;

    width: 100%;

    position: relative;

    .left {
        #logo {
            margin: 1vw 2.5vw 1vw 2.5vw;
            width: 4vw;
        }
    }
    .center {
        @include Fonte1_SS();
        font-size: 1.2vw;
        text-transform: uppercase;

        height: 100%;

        ul {
            display: flex;
            justify-content: center;

            height: 100%;

            li {
                display: flex;
                align-items: flex-end;

                height: 100%;

                @include menuSelection(transparent);

                &:hover {
                    background-color: $gray1;
                    color: $yellow;
                }

                a {
                    padding: 1.5vw 2.5vw 1.5vw 2.5vw;
                }
            }

            .actual {
                @include menuSelection($yellow);
            }
        }
    }
    .right {
        height: 100%;
    }
}
</style>
