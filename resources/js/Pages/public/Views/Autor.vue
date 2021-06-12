<template>
    <inertia-head>
        <title>Sanguanel | Autor</title>
        <meta name="description" :content="data.bio">
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
                            href="www.linkedin.com/in/angelo-schuler-piletti"
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
                    <img v-if="data.picture1" :src="data.picture1" alt="" />
                </div>
            </section>
            <section id="sec_3" class="paragraph" v-if="$page.props.user">
                <h4>{{ data.title2 }}</h4>
                <div>
                    <p>{{ data.text2 }}</p>
                    <!-- <img v-if="data.picture2" :src="data.picture2" alt="" /> -->
                </div>
            </section>
            <section id="sec_4" v-else>
                <h4>Quer saber mais sobre mim?</h4>
                <h3>Considere se cadastrar no site</h3>
                <inertia-link :href="route('register')">Vou me cadastrar</inertia-link>
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
    created(){
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
    
    section{
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
                border-radius: 50%;

                border: 3px solid $yellow
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

            margin-block: 2vw;
        }
        div {
            display: flex;
            align-items: center;

            p {
                @include Fonte2_SS;
                font-size: 1.4vw;

                text-align: justify;
            }
            img {
                width: 30vw;
                height: fit-content;
                margin-left: 2vw;
            }
        }
    }

    #sec_2{
        background-color: $black;
        color: $white;
    }

    #sec_4{
        text-align: center;

        h4{
            @include Titulo2_S;
            text-transform: uppercase;
            font-size: 2vw;
        }
        h3{
            @include Fonte2_SS;
            font-size: 1.5vw;

            margin-bottom: 3vw;
        }
        a{
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
</style>
