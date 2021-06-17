<template>
    <section id="ranking">
        <div id="Brazil">
            <Brasil @stateBR="whichState($event)" />
        </div>
        <div id="aside_container" data-state="none">
            <aside>
                <div>
                    <h4>{{ state }}</h4>
                    <hr />
                    <p v-show="state == 'Brasil'">
                        Passe o mouse sobre os estados para ver
                    </p>
                </div>

                <ul v-show="state != 'Brasil'">
                    Hidroméis mais consumidos em
                    {{
                        state
                    }}:
                    <!-- <li v-for="(marca, index) in hidromeis[state]" :key="index">
                        <h6>{{ index + 1 }}<sup>o</sup></h6>
                        {{ marca }}
                    </li> -->
                    <li>
                        <h6>Dados insuficientes...</h6>
                    </li>
                </ul>
            </aside>

            <div id="link">
                <inertia-link
                    v-if="$page.props.user"
                    id="participar"
                    href="/participar"
                    >Participar</inertia-link
                >
                <inertia-link v-else id="participar" :href="route('login')"
                    >Participar</inertia-link
                >
            </div>
        </div>
    </section>
</template>

<script>
import Brasil from "@/Pages/public/Components/svg/home_page/Brasil";

export default {
    data() {
        return {
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
    methods: {
        whichState: function ($event) {
            this.state = $event;
        },
    },
    components: {
        Brasil,
    },
    mounted() {
        var aside_container = document.querySelector("#aside_container");
        aside_container.dataset.state = "showing";
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/Layouts/mixin.scss";

#ranking {
    display: flex;
    justify-content: space-between;

    #Brazil {
        flex-grow: 1;
        max-height: 90vh;
    }

    [data-state="showing"] {
        animation: opacitySimple 500ms ease 600ms 1 normal both;
    }
    #aside_container {
        opacity: 0;
        flex-grow: 0;
        height: 100%;
        width: 25vw;
        margin-right: 5vw;

        aside {
            margin-top: 2.8vw;
            padding: 15px;

            background-color: $tinyback;
            border-radius: 8px;
            @include shadow();
            h4 {
                @include Titulo2_S();
                text-transform: uppercase;
                font-size: 2.2vw;
                color: $black;
            }
            hr {
                background-color: $black;
                outline: none;
                border: none;
                height: 1px;
                width: 100%;
                margin-top: 14px;
                margin-bottom: 12px;
            }

            ul,
            p {
                @include Fonte1_SS();
                font-size: 1.4vw;
                color: $black;

                li:first-of-type {
                    margin-top: 1.2vw;
                }
                li {
                    @include Fonte1_S();
                    font-size: 1.5vw;
                    text-transform: uppercase;

                    h6 {
                        @include Titulo2_S();
                        font-size: 2.2vw;
                        display: inline-block;
                        margin-right: 4px;

                        sup {
                            font-size: 1vw;
                        }
                    }
                }
            }
        }
        #link {
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

/*+-----------------------------------------------------+
  |                RESPONSIVIDADE                       |
  +-----------------------------------------------------+*/
@media (max-width: 1300px) {
    //
}
@media (max-width: 1100px) {
    #ranking {
        #Brazil {
            max-height: none;
        }
        #aside_container {
            width: 28vw;
            margin-right: 4vw;

            aside {
                margin-top: 4vw;
                padding: 13px;
                h4 {
                    font-size: 2.8vw;
                }
                hr {
                    margin-top: 4px;
                    margin-bottom: 10px;
                }

                ul,
                p {
                    font-size: 1.6vw;

                    li:first-of-type {
                        margin-top: 1.2vw;
                    }
                    li {
                        font-size: 1.5vw;

                        h6 {
                            font-size: 2.2vw;
                            margin-right: 4px;

                            sup {
                                font-size: 1vw;
                            }
                        }
                    }
                }
            }
            #link {
                margin-top: 10px;

                #participar {
                    font-size: 1.8vw;

                    padding: 7px;
                    border-radius: 4px;
                }
            }
        }
    }
}
</style>
