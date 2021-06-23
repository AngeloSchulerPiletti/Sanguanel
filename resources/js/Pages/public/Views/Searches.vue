<template>
    <!-- CABEÇALHO -->
    <inertia-head>
        <title>Pesquisa</title>
        <meta
            name="description"
            content="Página interna de pesquisa de artigos."
        />
    </inertia-head>
    <!-- CABEÇALHO -->

    <app-public :header_content="header">
        <section id="searches_container">
            <section id="articles_list">
                <h4>Todos os artigos encontrados com base em sua busca:</h4>
                <div class="container" v-if="articles_list.length > 0">
                    <articles-lister :articles_list="articles_list" />
                </div>
                <div id="notfound" v-else>
                    <h2>Nenhum artigo encontrado...</h2>
                    <!-- <div id="sugestion">
                        <h4>Gostaria de sugerir um tema?</h4>
                        FORMULÁRIO PARA SUGESTÃO
                    </div> -->
                </div>
            </section>
        </section>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";
import ArticlesLister from "@/Pages/public/Components/Sections/subhome_pages/ArticlesLister.vue";

export default {
    data() {
        return {
            header: {
                title: ["O resultado da sua", "Pesquisa"],
                style: "SubHomePages",
            },
            articles_list: {},
        };
    },
    created() {
        // console.log(this.$page.props);
        if (this.database != []) {
            this.articles_list = this.database;
        } else {
            this.articles_list = false;
        }
    },
    props: {
        database: Object,
    },
    components: {
        AppPublic,
        ArticlesLister,
    },
};
</script>

<style lang="scss" scoped>
#searches_container {
    display: flex;
    flex-direction: column;
    // gap: 10vw;
    min-height: 100vh;
    padding-top: 4vw;

    background-color: $black2;
    color: $white;

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
        #notfound {
            h2 {
                @include Titulo1_S;
                font-size: 3vw;
                margin-left: 4vw;
                border-left: 2px solid $yellow;
                padding-left: 1vw;
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
    #searches_container {
        #articles_list {
            gap: 4.5vw;

            h4 {
                @include Titulo2_S;
                font-size: 2.2vw;
                margin-left: 4.5vw;
            }
            .container {
                // width: 70%;
                // margin: auto;
            }
            #notfound {
                h2 {
                    font-size: 3.4vw;
                    margin-left: 4vw;
                    border-left: 2px solid $yellow;
                    padding-left: 1.5vw;
                }
            }
        }
    }
}
@media (max-width: 700px) {
    #searches_container {
        padding-top: 7vw;

        #articles_list {
            gap: 6.5vw;

            h4 {
                font-size: 2.8vw;
                margin-left: 5vw;
            }
            .container {
                width: 80%;
            }

            #notfound {
                h2 {
                    font-size: 4vw;
                    margin-left: 6vw;
                    padding-left: 2vw;
                }
            }
        }
    }
}
@media (max-width: 500px) {
    #searches_container {
        padding-top: 7vw;

        #articles_list {
            gap: 7.2vw;

            h4 {
                font-size: 3.3vw;
                margin: auto;
            }
            .container {
                width: 84%;
            }

            #notfound {
                //
            }
        }
    }
}
</style>
