<template>
    <inertia-head>
        <title>Artigos | {{name}}</title>
        <meta name="description" :content="database.description">
    </inertia-head>

    <app-public :header_content="header">
        <main id="fromarticles_container">
            <section id="description">
                <p>
                    {{ database.description }}Mussum Ipsum, cacilds vidis litro
                    abertis. Interagi no mé, cursus quis, vehicula ac nisi.
                    Cevadis im ampola pa arma uma pindureta. Per aumento de
                    cachacis, eu reclamis. Leite de capivaris, leite de mula
                    manquis sem cabeça.
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
                producao: [["a ", "Produção"], ["O Hidromel e sua", "Produção"]],
                historia: [["a ", "História"], ["O Hidromel e sua grande", "História"]],
                curiosidades: [["as ", "Curiosidades"], ["Tudo o quê você", "Não sabe"]],
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
        var assunto = this.subject,
            content = this.acceptSubjects;

        this.name = content[assunto][0][1]
        this.page_subject = content[assunto][0][0]+this.name;
        this.header.title = content[assunto][1];
    },
};
</script>

<style lang="scss" scoped>
#fromarticles_container{
    display: flex;
    flex-direction: column;
    gap: 10vw;

    background-color: $black;
    color: $white;

    min-height: 100vh;

    #description{
        border-left: 3px solid $yellow;
        width: 40%;
        margin-left: 10vw;
        padding: 4vw 0vw 1.8vw 1.8vw;

        @include Fonte2_S;
        font-size: 1.2vw;
        text-align: justify;
    }
    #articles_list{
        display: flex;
        flex-direction: column;
        gap: 3vw;

        h4{
            @include Titulo2_S;
            font-size: 2vw;
            margin-left: 4vw;
        }
        .container{
            width: 70%;
            margin: auto;
        }
    }
}
</style>
