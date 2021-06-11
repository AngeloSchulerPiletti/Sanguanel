<template>
    <inertia-head>
        <title>Institucional | {{ name }}</title>
        <meta name="description" :content="description" />
    </inertia-head>

    <app-public :header_content="header">
        <article v-html="article_data.text"></article>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";

export default {
    data() {
        return {
            header: {
                title: "",
                style: "SubHomePages",
            },
            acceptSubjects: {
                exposicao: ["Exposição", ["Uma pequena", "Declaração"]],
                politica: [
                    "Política de Privacidade",
                    ["Somos Cristalinos como um ", "Bom Hidromel"],
                ],
            },
            name: "",
            article_data: {
                title: "",
                author: "",
                img_path: "",
                text: "",
                date: "",
                description: "",
                keywords: "",
            },
            description: "",
        };
    },
    components: {
        AppPublic,
    },
    props: {
        subject: String,
        article: Object,
    },
    created() {
        var assunto = this.subject,
            content = this.acceptSubjects;

        this.header.title = content[assunto][1];
        this.name = content[assunto][0];

        this.article_data.text = this.article.text;
        this.description = this.article.description;
        this.article_data.keywords = this.article.keywords;
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/Layouts/mixin";

article {
    @include ArticleStyle();
}
</style>
