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
        <div id="actions" v-show="totalArticles > articles_perpage">
            <div class="actions_container">
                <div class="arrow" id="back" v-show="list_selector > 1" @click="setList(list_selector - 1)"><arrow color="$white"/></div>
                <div id="pages_number">
                    <span v-show="list_selector > 3" @click="setList(list_selector - 3)" >{{list_selector - 3}}</span>
                    <span v-show="list_selector > 2" @click="setList(list_selector - 2)" >{{list_selector - 2}}</span>
                    <span v-show="list_selector > 1" @click="setList(list_selector - 1)" >{{list_selector - 1}}</span>
                    <span id="actual_list"                                               >{{list_selector    }}</span>
                    <span v-show="(list_selector*articles_perpage) < totalArticles" @click="setList(list_selector + 1)">{{list_selector + 1}}</span>
                    <span v-show="((list_selector+1)*articles_perpage) < totalArticles" @click="setList(list_selector + 2)">{{list_selector + 2}}</span>
                    <span v-show="((list_selector+2)*articles_perpage) < totalArticles" @click="setList(list_selector + 3)">{{list_selector + 3}}</span>
                </div>
                <div class="arrow" id="next" v-show="(list_selector*articles_perpage) < totalArticles" @click="setList(list_selector + 1)"><arrow color="$white"/></div>
            </div>
        </div>
    </section>
</template>

<script>
import Arrow from "@/Pages/admin/Components/Icons/Arrow";

export default {
    data() {
        return {
            list_selector: 1,
            articles_perpage: 10,
            totalArticles: 0,
            articlesShowing: [],
        };
    },
    created() {
        this.listingArticles();
    },
    methods: {
        setList(wich){
            this.list_selector = wich;
            this.listingArticles();
            window.scrollTo(0, 0)
            console.log(this.list_selector);
        },
        listingArticles: function () {
            var keys = Object.keys(this.articles_list),
                perpage = this.articles_perpage,
                page = this.list_selector;
            
            this.totalArticles = keys.length;
            this.articlesShowing = [];
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
    components:{
        Arrow,
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

                overflow: hidden;
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
        color: $white;
        margin-top: 4vw;
        margin-bottom: 6vw;

        .actions_container{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2vw;


            .arrow{
                width: 3vw;
                height: 3vw;
                cursor: pointer;
            }
            #back{
                transform: scaleX(-1);
            }
            #pages_number{
                display: flex;
                gap: 1vw;

                span{
                    @include Fonte1_SS;
                    font-size: 1.6vw;
                    cursor: pointer;

                    @include anchorT($white, $yellow);
                }
                #actual_list{
                    color: $yellow;
                    text-decoration: underline;
                    cursor: auto;
                }
            }
            #next{

            }
        }
    }
}
</style>
