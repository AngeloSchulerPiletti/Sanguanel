<template>
    <app-public :header_content="header">
        <main id="fromarticles_container">
            <section id="description">
                <p>{{database[0].description}}</p>
            </section>
            <section id="articles_list">
                <h4>Todos os artigos sobre {{page_subject}} do hidromel</h4>
                <div>
                    <articles-lister :articles_list="articles_list"/>
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
                producao: ["Produção", ["O Hidromel e sua", "Produção"]],
                historia: ["História", ["O Hidromel e sua grande", "História"]],
                curiosidades: ["Curiosidades", ["Tudo o quê você", "Não sabe"]],
            },
            page_subject: "",
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
        console.log(this.database);
        console.log(this.articles_list);
        var assunto = this.subject,
            content = this.acceptSubjects;

        this.page_subject = content[assunto][0];
        this.header.title = content[assunto][1];
    },
};
</script>

<style></style>
