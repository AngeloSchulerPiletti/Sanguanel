<template>
    <!-- CABEÇALHO DA PÁGINA -->
    <inertia-head>
        <title>Sanguanel | {{ article_data.title }}</title>
        <meta
            name="description"
            :content="article_data.description"
        />
        <meta
            name="keywords"
            :content="article_data.keywords"/>
    </inertia-head>
    <!-- CABEÇALHO DA PÁGINA -->

    <app-public :header_content="header">
        <article v-html="article_data.text"></article>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";

export default {
    data() {
        return {
            article_data: {
                title: "",
                author: "",
                img_path: "",
                text: "",
                date: "",
                description: "",
                keywords: "",
            },
            header: {
                title: [""],
                style: "Contents",
                author: "",
                date: "",
            },
            description: "",
        };
    },
    components: {
        AppPublic,
    },
    props: {
        article: Object,
    },
    created() {
        this.header.title[0] = this.article.title;
        this.article_data.title = this.article.title;
        this.article_data.text = this.article.text;
        this.header.author = this.article.author;
        this.article_data.description = this.article.description;
        this.article_data.keywords = this.article.keywords;


        let lastDate = this.article.updated_at
            ? this.article.updated_at
            : this.article.created_at;

        var Reg = /-|T/;
        var date = lastDate.split(Reg);
        date.pop();

        this.header.date = date;

        var regex = />[^<]+/;
        this.description = this.article_data.text.match(regex)[0];
        this.description = this.description.replace('>', '');
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/Layouts/mixin";

article {
    @include ArticleStyle();
}
</style>
