<template>
    <header>
        <!-- Tipos de Cabeçalho para cada tipo página -->
        <!-- HomePages -->
        <div v-if="header.style == 'HomePages'" :id="header.style + '_div'">
            <h1 :class="'title_' + header.style">
                {{ header.title[0] }}<br />
                <h1>{{ header.title[1] }}</h1>
                {{ header.title[2] }}
            </h1>
        </div>
        <!-- SubHomePages -->
        <div v-if="header.style == 'SubHomePages'" :id="header.style + '_div'">
            <h1 :class="'title_' + header.style">
                {{ header.title[0] }}<br />
                <h1>{{ header.title[1] }}</h1>
            </h1>
        </div>
        <!-- Articles -->
        <div v-if="header.style == 'Contents'" :id="header.style + '_div'">
            <h1 :class="'title_' + header.style">
                {{ header.title[0] }}
            </h1>
            <div>
                <h6>Autor: {{ header.author }}</h6>
                <h6>
                    Data: {{ header.date[2] }}/{{ header.date[1] }}/{{
                        header.date[0]
                    }}
                </h6>
            </div>
        </div>

        <!-- Menuzinho direito -->
        <div id="menuzinho">
            <ul id="user_menus_container">
                <li class="user_menus" v-if="!$page.props.user">
                    <inertia-link href="/register"> Registrar </inertia-link>
                </li>

                <li class="user_menus" v-if="!$page.props.user">
                    <inertia-link href="/login">
                        Login
                        <IconLock id="login_icon" />
                    </inertia-link>
                </li>

                <li class="user_menus" v-if="$page.props.user">
                    <legend>
                        Bem vindo, {{ $page.props.user.name.split(" ")[0] }}!
                    </legend>
                </li>
                <li class="user_menus" id="drop_list" v-if="$page.props.user">
                    <drop-menu :links="links" type="public" />
                </li>
            </ul>
        </div>
    </header>
</template>

<script>
import DropMenu from "@/Layouts/Components/Templates/DropMenu";
import IconLock from "@/Pages/public/Components/svg/home_page/IconLock";

export default {
    data() {
        return {
            header: {
                style: "",
                title: "",
                author: "",
                date: "",
            },
            links: {
                Conta: route("account.profile"),
            },
        };
    },
    props: {
        header_content: Object,
    },
    components: {
        IconLock,
        DropMenu,
    },
    methods: {
        // close(){
        //     this.$refs.dropmenu.arrowCall();
        // },
    },
    created() {
        if (this.header_content.style) {
            if (this.header_content.style == "Contents") {
                this.header.author = this.header_content.author;
                this.header.date = this.header_content.date;
            }

            this.header.style = this.header_content.style;
            this.header.title = this.header_content.title;
        } else {
        }
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/public/Components/mixins.scss";

header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;

    padding: 1.6vw 1.6vw 1vw 2.5vw;
    background-color: $black;
    color: $white;

    @include headerStyle();

    transform-style: preserve-3d;

    #user_menus_container {
        flex-shrink: 0;

        display: flex;
        flex-direction: row;
        align-items: flex-end;

        .user_menus {
            margin: 0 0.5vw 1vw 0.5vw;

            a {
                @include Fonte2_SS;
                font-size: 1.2vw;

                @include anchorT($white, $yellow);

                #login_icon {
                    display: inline-block;
                    transform: translateY(25%);
                }
            }
            legend {
                @include Fonte2_S;
                font-size: 1.4vw;
            }
        }

        #drop_list {
            position: relative;
        }
    }
}

/*+-----------------------------------------------------+
  |                RESPONSIVIDADE                       |
  +-----------------------------------------------------+*/
@media (max-width: 1300px) {
    //
}
@media (max-width: 1100px) {
    header {
        padding: 1.6vw 1.6vw 1vw 2.5vw;

        @include headerStyle2();

        #user_menus_container {
            .user_menus {
                a {
                    font-size: 1.8vw;
                }
                legend {
                    font-size: 1.8vw;
                }
            }
        }
    }
}
@media (max-width: 700px) {
    header {
        padding: 2.1vw 2vw 1vw 3vw;

        // @include headerStyle3();

        #user_menus_container {
            .user_menus {
                a {
                    font-size: 2.2vw;
                }
                legend {
                    font-size: 2.2vw;
                }
            }
        }
    }
}
@media (max-width: 500px) {
    header {
        // padding: 2.1vw 2vw 1vw 3vw;
        padding: 0vw;

        justify-content: none;
        flex-direction: column;
        align-items: flex-start;

        @include headerStyle3();

        #menuzinho {
            width: 100%;
            background-color: $tinyback;
            color: $black;
            padding: 2.1vw 2vw 1vw 3vw;

            #user_menus_container {
                margin-left: auto;
                width: fit-content;

                .user_menus {
                    a {
                                        @include Fonte1_S;

                        font-size: 2.5vw;
                    }
                    legend {
                                        @include Fonte1_S;

                        font-size: 2.8vw;
                    }
                }
            }
        }
    }
}
</style>
