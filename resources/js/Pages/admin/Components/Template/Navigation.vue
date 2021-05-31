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
        <div class="right">
            <div class="r_button">
                <arrow
                    id="arrow_btn"
                    data-btnstate="none"
                    @click="arrowCall($event)"
                />
            </div>
            <div class="r_drop" data-dropstate="none">
                <ul>
                    <li>
                        <!-- <inertia-link class="drop_links" href="{{ route('logout') }}"
                            >Sair</inertia-link
                        > -->
                        <!-- <form action="/logout" method="post">
                            <button type="submit">Sair</button>
                        </form> -->
                        <hr />
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import LogoPreto from "@/Pages/admin/Components/Icons/LogoPreto";
import Arrow from "@/Pages/admin/Components/Icons/Arrow";

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
        Arrow,
    },
    props: {
        atPage: String,
    },
    methods: {
        arrowCall: function (event) {
            var btn = event.target,
                dropbox = event.path[2].querySelector(".r_drop");

            if (
                btn.dataset.btnstate == "close" ||
                btn.dataset.btnstate == "none"
            ) {
                dropbox.style.display = "block";
                btn.dataset.btnstate = "open";
                dropbox.dataset.dropstate = "show";
            } else {
                btn.dataset.btnstate = "close";
                dropbox.dataset.dropstate = "hide";

                setTimeout(function () {
                    dropbox.style.display = "none";
                }, 110);
            }
        },
    },
    mounted() {
        this.li[this.atPage] = "actual";
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/admin/Components/animations";

@mixin menuSelection() {
    border-bottom: 3px solid $yellow;
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
    .right {
        height: 100%;

        .r_button {
            height: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            [data-btnstate] {
                transform: rotate(90deg);
                width: 2vw;

                transition-duration: 200ms;
                transition-property: transform;

                &:hover {
                    cursor: pointer;
                }
            }
            // [data-btnstate="none"]{
            //     // display: none;
            // }
            [data-btnstate="open"] {
                transform: scaleY(-1) rotate(90deg);
            }
            [data-btnstate="close"] {
                transform: scaleY(1) rotate(90deg);
            }
        }
        [data-dropstate] {
            position: absolute;
            background-color: $tinyback;

            border-radius: 0 0 0.7vw 0.7vw;
            padding: 0.5vw 0 0.5vw 0;

            width: 14vw;

            li {
                @include Fonte2_SS();
                font-size: 1.4vw;
                width: 100%;

                display: flex;
                flex-direction: column;

                .drop_links {
                    padding: 0.6vw 1.2vw 0.6vw 1.2vw;

                    transition-duration: 200ms;
                    transition-property: border;

                    &:hover {
                        border-left: 3px solid $yellow;
                    }
                }
                hr {
                    border: none;
                    outline: none;

                    height: 1px;
                    background-color: $white;

                    margin: 0.5vw 0 0.5vw 0;
                }
            }
        }
        [data-dropstate="none"] {
            display: none;
        }
        [data-dropstate="show"] {
            animation: showDropbox 100ms ease 0ms 1 normal both;
        }
        [data-dropstate="hide"] {
            animation: hideDropbox 100ms ease 0ms 1 normal both;
        }
    }
}
</style>
