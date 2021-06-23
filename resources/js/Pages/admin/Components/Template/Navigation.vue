<template>
    <nav>
        <div class="left">
            <inertia-link href="/"><logo-preto id="logo" /></inertia-link>
        </div>
        <div class="center">
            <ul>
                <li v-if="!$page.props.user" :class="li.register">
                    <inertia-link :href="route('register')"
                        >Registrar</inertia-link
                    >
                </li>
                <li v-if="!$page.props.user" :class="li.login">
                    <inertia-link :href="route('login')">Entrar</inertia-link>
                </li>
                <li v-if="$page.props.user" :class="li.account">
                    <inertia-link :href="route('account.profile')"
                        >Conta</inertia-link
                    >
                </li>
                <li
                    v-if="$page.props.user && $page.props.user.adminLevel > 2"
                    :class="li.admin"
                >
                    <inertia-link :href="route('admin.')"
                        >Administrador</inertia-link
                    >
                </li>
            </ul>
        </div>

        <!-- Drop Menu -->
        <div v-if="$page.props.user" class="right">
            <drop-menu :links="links" type="admin" />
        </div>
    </nav>
</template>

<script>
import LogoPreto from "@/Pages/admin/Components/Icons/LogoPreto";
import DropMenu from "@/Layouts/Components/Templates/DropMenu";

export default {
    data() {
        return {
            li: {
                login: "",
                register: "",
                account: "",
                admin: "",
            },
            links: {
                // "Conta": "/dashboard",
            },
        };
    },
    components: {
        LogoPreto,
        DropMenu,
    },
    props: {
        atPage: String,
    },
    methods: {},
    mounted() {
        this.li[this.atPage] = "actual";
    },
};
</script>

<style lang="scss" scoped>
@import 'resources/css/sass/admin/Components/navlinks';

nav {
    display: grid;
    grid-template-columns: 1fr 4fr 1fr;

    width: 100%;
    background-color: $white;
    transform-style: preserve-3d;

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

        @include links();
    }
    .right {
        height: 100%;
    }
}

/*+-----------------------------------------------------+
  |                RESPONSIVIDADE                       |
  +-----------------------------------------------------+*/
@media (max-width: 1300px) {
    //
}
@media (max-width: 1100px) {
    nav {
        display: grid;
        grid-template-columns: 1fr 4fr 1fr;

        width: 100%;

        .left {
            #logo {
                margin: 1.5vw 3vw 1.5vw 3vw;
                width: 6vw;
            }
        }
        .center {
            font-size: 1.8vw;
        }
        // .right {
        //     height: 100%;
        // }
    }
}
@media (max-width: 700px) {
    nav {
        .left {
            #logo {
                // margin: 1.5vw 3vw 1.5vw 3vw;
                width: 8vw;
            }
        }
        .center {
            font-size: 2.4vw;
        }
    }
}
@media (max-width: 500px) {
    nav {
        .left {
            #logo {
                margin: 2vw 4vw 2vw 4vw;
                width: 11vw;
            }
        }
        .center {
            font-size: 3vw;
        }
    }
}
</style>
