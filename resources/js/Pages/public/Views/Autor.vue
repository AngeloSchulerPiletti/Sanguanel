<template>
    <inertia-head>
        <title>Sanguanel | Autor</title>
        <meta name="description" :content="data.bio" />
    </inertia-head>

    <app-public :header_content="header">
        <section id="author_container">
            <section id="sec_1">
                <div class="top">
                    <img
                        id="profile"
                        :src="data.profile"
                        alt="Foto de Perfil"
                    />
                    <p id="bio">{{ data.bio }}</p>
                </div>
                <div class="bottom">
                    <div>
                        <a
                            class="iconlinks_container"
                            href="https://linkedin.com/in/angelo-schuler-piletti"
                        >
                            <linkedin class="icon" />

                            <legend>LINKEDIN</legend></a
                        >
                    </div>
                    <div>
                        <a
                            class="iconlinks_container"
                            href="https://github.com/AngeloSchulerPiletti"
                        >
                            <github class="icon" />
                            <legend>GITHUB</legend></a
                        >
                    </div>
                </div>
            </section>
            <section id="sec_2" class="paragraph">
                <h4>{{ data.title1 }}</h4>
                <div>
                    <p>{{ data.text1 }}</p>
                    <img
                        class="img_right"
                        v-if="data.picture1"
                        :src="data.picture1"
                        alt=""
                    />
                </div>
            </section>
            <section id="sec_3" class="paragraph" v-if="$page.props.user">
                <h4>{{ data.title2 }}</h4>
                <div>
                    <img
                        class="img_left"
                        v-if="data.picture2 != ' '"
                        :src="data.picture2"
                        alt=""
                    />
                    <p>{{ data.text2 }}</p>
                </div>
            </section>
            <section id="sec_4" v-else>
                <h4>Quer saber mais sobre mim?</h4>
                <h3>Considere se cadastrar no site</h3>
                <inertia-link :href="route('register')"
                    >Vou me cadastrar</inertia-link
                >
            </section>
        </section>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";
import Github from "@/Pages/public/Components/Icons/Github";
import Linkedin from "@/Pages/public/Components/Icons/Linkedin";

export default {
    data() {
        return {
            header: {
                title: ["Pazer, sou o", "Angelo", ""],
                style: "HomePages",
            },
        };
    },
    created() {
        //
    },
    components: {
        AppPublic,
        Github,
        Linkedin,
    },
    props: {
        data: Object,
    },
};
</script>

<style lang="scss" scoped>
#author_container {
    padding-bottom: 10vw;

    section {
        padding: 4vw;
    }

    #sec_1 {
        display: flex;
        flex-direction: column;

        margin-bottom: 2vw;

        .top {
            display: flex;
            align-items: center;

            #profile {
                object-fit: cover;
                width: 15vw;
                height: 15vw;
                border-radius: 100%;

                border: 3px solid $yellow;
            }
            #bio {
                @include Fonte2_S;
                font-size: 1.45vw;
                margin-left: 5vw;
                text-align: justify;
            }
        }
        .bottom {
            display: flex;

            margin-top: 4vw;

            .iconlinks_container {
                display: flex;
                align-items: flex-end;

                &:first-child {
                    margin-right: 2vw;
                }

                @include Fonte1_S;
                font-size: 1.3vw;

                @include anchorT($black, $yellow);

                .icon {
                    width: 2.1vw;
                    height: 2.1vw;
                    margin-right: 0.5vw;

                    display: inline-block;
                }
            }
        }
    }

    .paragraph {
        margin: 4vw 0 0 0;
        h4 {
            @include Titulo2_S;
            text-transform: uppercase;
            font-size: 2.4vw;
            margin-bottom: 1vw;
        }
        div {
            display: flex;
            align-items: center;

            p {
                @include Fonte2_SS;
                font-size: 1.4vw;

                text-align: justify;
            }
            .img_left,
            .img_right {
                width: 30vw;
                height: fit-content;
            }
            .img_left {
                margin-right: 2vw;
            }
            .img_right {
                margin-left: 2vw;
            }
        }
    }

    #sec_2 {
        background-color: $black2;
        color: $white;
    }

    #sec_4 {
        text-align: center;

        h4 {
            @include Titulo2_S;
            text-transform: uppercase;
            font-size: 2vw;
        }
        h3 {
            @include Fonte2_SS;
            font-size: 1.5vw;

            margin-bottom: 3vw;
        }
        a {
            @include Fonte1_SS;
            font-size: 1.6vw;
            background-color: $black;
            color: $white;

            padding: 0.6vw 1vw 0.6vw 1vw;
            border-radius: 0.3vw;

            @include anchorT($white, $yellow);
        }
    }
}

/*+-----------------------------------------------------+
  |                RESPONSIVIDADE                       |
  +-----------------------------------------------------+*/
@media (max-width: 1100px) {
    #author_container {

        #sec_1 {
            margin-bottom: 2vw;

            .top {
                #profile {
                    width: 19vw;
                    height: 19vw;
                }
                #bio {
                    font-size: 1.6vw;
                }
            }
            .bottom {
                margin-top: 4vw;

                .iconlinks_container {
                    align-items: center;

                    &:first-child {
                        margin-right: 4vw;
                    }

                    font-size: 1.8vw;

                    .icon {
                        width: 2.7vw;
                        height: 2.7vw;
                        margin-right: 0.9vw;
                    }
                }
            }
        }

        .paragraph {
            margin: 4vw 0 0 0;
            h4 {
                font-size: 2.9vw;
                margin-bottom: 2vw;
            }
            div {
                p {
                    font-size: 1.6vw;
                }
                .img_left,
                .img_right {
                    width: 38vw;
                }
                .img_left {
                    margin-right: 3vw;
                }
                .img_right {
                    margin-left: 3vw;
                }
            }
        }

        #sec_4 {
            h4 {
                text-transform: uppercase;
                font-size: 2vw;
            }
            h3 {
                font-size: 1.5vw;

                margin-bottom: 3vw;
            }
            a {
                font-size: 1.6vw;

                padding: 0.6vw 1vw 0.6vw 1vw;
                border-radius: 0.3vw;
            }
        }
    }
}

@media (max-width: 700px) {
    #author_container {
        // padding-bottom: 10vw;

        section {
            padding: 2vw;
        }

        #sec_1 {
            padding-top: 5vw;
            .top {
                #bio {
                    font-size: 1.85vw;
                }
            }
            .bottom {
                margin-top: 5vw;

                .iconlinks_container {
                    &:first-child {
                        margin-right: 6vw;
                    }

                    font-size: 2vw;

                    .icon {
                        width: 3vw;
                        height: 3vw;
                        margin-right: 1.1vw;
                    }
                }
            }
        }

        .paragraph {
            margin: 4vw 0 0 0;
            padding: 5vw;
            h4 {
                font-size: 2.9vw;
                margin-bottom: 2vw;
            }
            div {
                // display: flex;
                // flex-direction: column;

                p {
                    font-size: 1.75vw;
                }
                .img_left,
                .img_right {
                    width: 38vw;
                    background-color: $yellow;
                }
                .img_right {
                    margin-left: 3vw;
                    padding: 0.6vw 2.6vw 2.6vw 0.6vw;
                    transform: translateY(40%);
                }
                .img_left {
                    order: 2;
                    margin-left: 3vw;
                    padding: 0.6vw 0.6vw 2.6vw 2.6vw;
                }
            }
        }

        #sec_2 {
            margin-bottom: 9vw;
        }

        #sec_4 {
            margin-top: 13vw;
            h4 {
                font-size: 3.8vw;
            }
            h3 {
                font-size: 2vw;

                margin-bottom: 5vw;
            }
            a {
                font-size: 3vw;

                padding: 1vw 2vw 1vw 2vw;
                border-radius: 0.6vw;
            }
        }
    }
}

@media (max-width: 500px) {
    #author_container {
        // padding-bottom: 10vw;

        section {
            padding: 2vw;
        }

        #sec_1 {
            padding-top: 9vw;
            margin-bottom: 15vw;

            .top {
                display: flex;
                flex-direction: column;
                align-items: center;

                #profile {
                    width: 35vw;
                    height: 35vw;
                    margin-bottom: 6vw;
                }
                #bio {
                    font-size: 2.35vw;
                    margin-left: 0;
                    text-align: center;
                    width: 90%;
                }
            }
            .bottom {
                margin-top: 6vw;
                display: flex;
                align-items: center;
                justify-content: space-around;

                .iconlinks_container {
                    &:first-child {
                        margin-right: 0;
                    }
                    font-size: 3vw;

                    .icon {
                        width: 5vw;
                        height: 5vw;
                        margin-right: 1.8vw;
                    }
                }
            }
        }

        .paragraph {
            margin: 8vw 0 0 0;
            padding: 8vw;

            h4 {
                font-size: 4.2vw;
                margin-bottom: 4vw;
            }
            div {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 7vw;

                p {
                    font-size: 2.4vw;
                }
                .img_left,
                .img_right {
                    width: 50vw;
                    margin: 0;
                    background-color: $yellow;
                }
                .img_right {
                    padding: 1vw 5vw 0 0;
                    transform: translateY(0);
                }
                .img_left {
                    padding: 1vw 0 0 5vw;
                    margin-left: auto;
                }
            }
        }

        #sec_2 {
            margin-bottom: 9vw;
        }

        #sec_4 {
            margin-top: 10vw;
            h4 {
                font-size: 4.5vw;
            }
            h3 {
                font-size: 3.5vw;

                margin-bottom: 6.5vw;
            }
            a {
                font-size: 3.5vw;

                padding: 1.7vw 2.8vw 1.7vw 2.8vw;
                border-radius: 0.95vw;
            }
        }
    }
}
</style>
