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
            </ul>
        </div>

        <!-- O propósito disso é abrir uma lista com opçõe do tipo:
        LogOut, entre outras coisas -->
        <div class="right"></div>
    </nav>
</template>

<script>
import LogoPreto from "@/Pages/admin/Components/Icons/LogoPreto";

export default {
    data() {
        return {
            li: {
                login: "",
                register: "",
                dashboard: "",
            },
        };
    },
    components: {
        LogoPreto,
    },
    props: {
        atPage: String,
    },
    mounted() {
        this.li[this.atPage] = "actual";
    },
};
</script>

<style lang="scss" scoped>
@mixin menuSelection() {
    border-bottom: 3px solid $yellow;
}

nav {
    display: grid;
    grid-template-columns: 1fr 4fr 1fr;

    width: 100%;

    .left {
        #logo {
            margin: 1vw 2.5vw 1vw 2.5vw;
            width: 4.6vw;
        }
    }
    .center {
        @include Fonte1_SS();
        font-size: 1.2vw;
        text-transform: uppercase;

        flex-grow: 1;

        ul {
            display: flex;
            justify-content: center;

            height: 100%;

            li {
                display: flex;
                align-items: flex-end;

                height: 100%;

                &:hover {
                    background-color: $gray1;
                    color: $yellow;
                }

                a {
                    padding: 1.5vw 2.5vw 1.5vw 2.5vw;
                }
            }

            .actual {
                @include menuSelection();
            }
        }
    }
}
</style>
