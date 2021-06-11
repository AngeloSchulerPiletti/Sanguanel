<template>
    <section id="list">
        <ul>
            <li v-for="(article, index) in articlesShowing" :key="index">
                <inertia-link :href="'/' + article.subject + '/' + article.url">
                    <div class="article_card">
                        <h2 class="card_title">{{ article.title }}</h2>
                        <hr />
                        <p class="card_paragraph">{{ article.description }}</p>
                    </div>
                </inertia-link>
            </li>
        </ul>
        <div id="actions"></div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            list_selector: 1,
            articles_perpage: 15,
            articlesShowing: [],
        };
    },
    created() {
        this.listingArticles();
    },
    methods: {
        listingArticles: function () {
            var keys = Object.keys(this.articles_list),
                perpage = this.articles_perpage,
                page = this.list_selector;

            for (
                let i = perpage * page - perpage;
                i < perpage * page && i < keys.length;
                i++
            ) {
                this.articlesShowing.push(this.articles_list[keys[i]]);
            }
        },
    },
    props: {
        articles_list: Object,
    },
};
</script>

<style lang="scss" scoped>
#list {
    ul {
        display: flex;
        flex-direction: column;
        gap: 3vw;

        .article_card {
            background-color: $white;
            color: $black;
            border-left: 3px solid $yellow;

            border-radius: 0.8vw;
            padding: 2vw;

            .card_title {
                @include Titulo2_S;
                text-transform: uppercase;
                font-size: 3vw;
            }
            hr {
                outline: none;
                border: none;
                height: 1px;
                background-color: $yellow;

                width: 30%;
            }
            .card_paragraph {
                @include Fonte1_SS;
                font-size: 1.45vw;
                text-align: justify;
                height: 7vw;

                overflow: auto;
            }

            transition-duration: 200ms;
            transition-property: transform;
            transition-property: transform;

            &:hover {
                transform: scale(1.02);
                transition-duration: 250ms;
            }
        }
    }
    #actions {
    }
}
</style>
