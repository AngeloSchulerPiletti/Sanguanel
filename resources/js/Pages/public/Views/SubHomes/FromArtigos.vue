<template>
    <inertia-head>
        <title>Artigos | {{ name }}</title>
        <meta name="description" :content="database.description" />
    </inertia-head>

    <app-public :header_content="header">
        <main id="fromarticles_container">
            <section id="description">
                <p>
                    {{ database.description }}
                </p>
            </section>
            <section id="articles_list">
                <h4>Todos os artigos sobre {{ page_subject }} do hidromel</h4>
                <div class="container">
                    <articles-lister :articles_list="articles_list" />
                </div>
            </section>
        </main>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";
import ArticlesLister from "@/Pages/public/Components/Sections/subhome_pages/ArticlesLister.vue";

export default {
    data() {
        return {
            header: {
                title: "",
                style: "SubHomePages",
            },
            acceptSubjects: {
                producao: [
                    ["a ", "Produção"],
                    ["O Hidromel e sua", "Produção"],
                ],
                historia: [
                    ["a ", "História"],
                    ["O Hidromel e sua grande", "História"],
                ],
                curiosidades: [
                    ["as ", "Curiosidades"],
                    ["Tudo o quê você", "Não sabe"],
                ],
            },
            page_subject: "",
            name: "",
        };
    },
    props: {
        subject: String,
        database: Object,
        articles_list: Object,
    },
    components: {
        AppPublic,
        ArticlesLister,
    },
    created() {
        // console.log(this.database);
        var assunto = this.subject,
            content = this.acceptSubjects;

        this.name = content[assunto][0][1];
        this.page_subject = content[assunto][0][0] + this.name;
        this.header.title = content[assunto][1];
    },
};
</script>

<style lang="scss" scoped>
#fromarticles_container {
    display: flex;
    flex-direction: column;
    gap: 10vw;

    background-color: $black2;
    color: $white;

    min-height: 100vh;

    #description {
        border-left: 3px solid $yellow;
        width: 40%;
        margin-left: 10vw;
        padding: 4vw 0vw 1.8vw 1.8vw;

        @include Fonte2_S;
        font-size: 1.2vw;
        text-align: justify;
    }
    #articles_list {
        display: flex;
        flex-direction: column;
        gap: 3vw;

        h4 {
            @include Titulo2_S;
            font-size: 2vw;
            margin-left: 4vw;
        }
        .container {
            width: 70%;
            margin: auto;
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
    #fromarticles_container {
        gap: 10vw;

        #description {
            width: 60%;
            margin-left: 12vw;
            padding: 4.5vw 0vw 2vw 2vw;

            font-size: 1.5vw;
        }
        #articles_list {
            gap: 4.5vw;

            h4 {
                @include Titulo2_S;
                font-size: 2.2vw;
                margin-left: 4.5vw;
            }
        }
    }
}
@media (max-width: 700px) {
    #fromarticles_container {
        gap: 15vw;

        #description {
            width: 60%;
            margin-left: 14vw;
            padding: 5vw 0vw 3.2vw 3.2vw;

            font-size: 2.2vw;
        }
        #articles_list {
            gap: 6.5vw;

            h4 {
                font-size: 2.8vw;
                margin-left: 5vw;
            }
            .container {
                width: 80%;
            }
        }
    }
}
@media (max-width: 500px) {
    #fromarticles_container {
        gap: 15vw;

        #description {
            width: 70%;
            margin-left: 9.5vw;
            padding: 9vw 0vw 4vw 4.2vw;

            font-size: 3.2vw;
        }
        #articles_list {
            gap: 7.2vw;

            h4 {
                font-size: 3.8vw;
                margin: auto;
            }
            .container {
                width: 84%;
            }
        }
    }
}
</style>
