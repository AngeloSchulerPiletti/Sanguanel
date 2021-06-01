<template>
    <app-public :header_content="header">
        <div id="website_home">
            <Messages :flashes="flash" />
            <!-- <div id="messages">
            <div :id="key" v-for="(message, key) in flash" :key="key">
                {{message}}
            </div>
        </div> -->

            <section id="ranking">
                <div id="Brazil">
                    <Brasil @stateBR="whichState($event)" />
                    <div></div>
                </div>
                <div>
                    <aside>
                        <h4>{{ state }}</h4>
                        <hr />
                        <p v-show="state == 'Brasil'">
                            Passe o mouse sobre os estados para ver
                        </p>
                        <ul v-show="state != 'Brasil'">
                            Hidroméis mais consumidos em
                            {{
                                state
                            }}:
                            <li
                                v-for="(marca, index) in hidromeis[state]"
                                :key="index"
                            >
                                <h6>{{ index + 1 }}<sup>o</sup></h6>
                                {{ marca }}
                            </li>
                        </ul>
                    </aside>
                    <form>
                        <inertia-link v-if="$page.props.user" id="participar" href="/participar"
                            >Participar</inertia-link
                        >
                        <inertia-link v-else id="participar" :href="route('login')"
                            >Participar</inertia-link
                        >
                    </form>
                </div>
            </section>

            <section></section>
        </div>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";
import Brasil from "@/Pages/public/Components/svg/home_page/Brasil";
import Header from "@/Pages/public/Components/Template/Header";
import Messages from "@/Pages/public/Components/Template/Messages";
export default {
    data() {
        return {
            header: {
                'title': ["O Maior Editorial", "Hidromeleiro", "do Brasil"],
                'style': 'HomePages',
            },
            state: "Brasil",
            hidromeis: {
                "Rio Grande do Sul": [
                    "Arven",
                    "Hidromeliantes",
                    "Pingo d'ouro",
                ],
                "Santa Catarina": ["Teste"],
                Paraná: ["Teste"],
                "São Paulo": ["Teste"],
                "Minas Gerais": ["Teste"],
                "Mato Grosso": ["Teste"],
                "Mato Grosso do Sul": ["Teste"],
                "Rio Grande do Norte": ["Teste"],
                Paraíba: ["Teste"],
                Pará: ["Teste"],
                Amazonas: ["Teste"],
                Roraima: ["Teste"],
                Rondônia: ["Teste"],
                Acre: ["Teste"],
                Pernambuco: ["Teste"],
                Bahia: ["Teste"],
                "Rio de Janeiro": ["Teste"],
                Sergipe: ["Teste"],
                Tocantins: ["Teste"],
                "Espírito Santo": ["Teste"],
                "Distrito Federal": ["Teste"],
                Goiás: ["Teste"],
                Maranhão: ["Teste"],
                Alagoas: ["Teste"],
                Piauí: ["Teste"],
                Ceará: ["Teste"],
                Amapá: ["Teste"],
            },
        };
    },
    props: {
        flash: Object,
    },
    methods: {
        whichState: function ($event) {
            this.state = $event;
        },
        sendEmit: function () {
            this.$emit("sent-to-header");
        },
    },
    components: {
        Brasil,
        Header,
        AppPublic,
        Messages,
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/Layouts/mixin.scss";
#website_home {
    // #messages{

    // }

    #ranking {
        display: flex;

        #Brazil {
            flex-grow: 1;
        }
        div {
            flex-grow: 0;
            height: 100%;
            width: 25vw;
            margin-right: 2vw;

            aside {
                margin-top: 2.8vw;
                padding: 15px;

                background-color: $gray1;
                border-radius: 8px;
                @include shadow();
                h4 {
                    @include Titulo3_SS();
                    font-size: 2.2vw;
                    color: $black;
                }
                hr {
                    background-color: $white;
                    width: 100%;
                    margin-top: 14px;
                    margin-bottom: 12px;
                }

                ul,
                p {
                    @include Fonte2_SS();
                    font-size: 1.4vw;
                    color: $white;

                    li:first-of-type {
                        margin-top: 1.2vw;
                    }
                    li {
                        @include Fonte1_S();
                        font-size: 1.5vw;

                        h6 {
                            @include Titulo2_S();
                            font-size: 2.2vw;
                            display: inline-block;
                            margin-right: 4px;

                            sup {
                                font-size: 1.5vw;
                            }
                        }
                    }
                }
            }
            form {
                margin-top: 30px;

                #participar {
                    @include Titulo2_S();
                    @include shadow();
                    font-size: 1.5vw;
                    text-transform: uppercase;

                    padding: 8px;
                    border-radius: 3px;
                    background-color: $black;
                    color: $white;

                    transition-property: box-shadow, color;
                    transition-duration: 300ms;

                    &:hover {
                        box-shadow: 0 0 0 0;
                        color: $yellow;
                    }
                }
            }
        }
    }
}
</style>
