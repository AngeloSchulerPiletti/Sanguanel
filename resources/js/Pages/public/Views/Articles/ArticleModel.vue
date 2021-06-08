<template>
    <!-- CABEÇALHO DA PÁGINA -->
    <inertia-head>
        <title>Sanguanel | {{ article_data.title }}</title>
        <meta
            name="description"
            :content="description"
        />
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
article {
    color: $black;
    padding: 2.4vw 2.4vw 2.4vw 2.4vw;

    &::v-deep {
        .simple_p {
            @include Fonte1_SS;
            font-size: 1.3vw;
            text-align: justify;

            margin: 0.3vw 0 2vw 0;
        }
        .tiny_p {
            @include Fonte1_SS;
            font-size: 1.1vw;
            text-transform: uppercase;

            margin: 2vw 0 2vw 0;
        }
        .small50 {
            font-size: 50%;
        }
        .small75 {
            font-size: 75%;
        }

        a {
            @include anchorA($black, $yellow);
        }

        //=========== Títulos ============//
        h1 {
            @include Titulo1_S;
            font-size: 2.2vw;
            text-transform: uppercase;
        }
        h2 {
            @include Titulo2_S;
            font-size: 1.9vw;
            text-transform: uppercase;
        }
        h3 {
            @include Titulo2_S;
            font-size: 1.7vw;
            text-transform: uppercase;
        }
        h4 {
            @include Titulo2_S;
            font-size: 1.7vw;
            text-transform: capitalize;
        }
        h5 {
            @include Fonte1_S;
            font-size: 1.7vw;
            text-transform: capitalize;
        }
        h6 {
            @include Fonte2_S;
            font-size: 1.5vw;
            text-transform: capitalize;
        }

        .elegant_hr {
            outline: none;
            border: none;
            height: 1px;
            background-color: $black;
            margin: 1vw auto 1vw auto;
        }

        ul {
            @include Fonte2_SS;
            font-size: 1.3vw;
            margin: 0.3vw 0 2vw 0;

            li {
                margin: 0 0 0.5vw 1.2vw;
                padding-left: 0.8vw;

                border-left: 2px solid $yellow;
            }
        }

        .img_container {
            width: fit-content;

            .img_alternative {
                @include Fonte2_SS;
                text-transform: capitalize;
                font-size: 1vw;

                margin-top: 0.5vw;
            }

            img {
                border: 2px solid $black;
            }
            .big {
                width: 50vw;
            }
            .medium {
                width: 40vw;
            }
            .small {
                width: 26vw;
            }
        }
        .center {
            margin: 2vw auto 2vw auto;
        }
        .right {
            margin: 2vw 0 2vw auto;
        }
        .left {
            margin: 2vw auto 2vw 0;
        }
    }
}
</style>
