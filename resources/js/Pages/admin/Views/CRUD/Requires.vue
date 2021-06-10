<template>
    <app-admin atPage="admin" atSubpage="requires" :message="messages">
        <section id="requires_list">
            <div class="top">
                <h3>Aqui você encontra artigos aguardando resposta</h3>
                <p>
                    Você pode vizualizar como o artigo se parece no website,
                    lê-lo e então aceitar o artigo ou negá-lo.
                </p>
            </div>
            <div class="bottom">
                <ul v-if="Object.keys(requires_list).length > 0">
                    <li v-for="(require, index) in requires_list" :key="index">
                        <div class="require_card">
                            <div class="informations_card">
                                <div class="card_top">
                                    <h4>{{ require.author }}</h4>
                                    <h2>{{ require.title }}</h2>
                                </div>
                                <div class="card_center">
                                    <span :class="require.status"
                                        >status: {{ require.status }}</span
                                    >
                                    <span class="subject">{{
                                        require.subject
                                    }}</span>
                                </div>
                            </div>

                            <div class="actions_card">
                                <aprove class="icons" @click="aprove(require.id)"/>
                                <edit class="icons" />
                                <see
                                    class="icons"
                                    @click="seeArticle(require.text)"
                                />
                                <remove class="icons" @click="destroy(require.id)" />
                            </div>
                        </div>
                    </li>
                </ul>
                <h4 v-else>Você não possui pendências</h4>
            </div>
        </section>
        <section id="article_view" v-show="text != ''">
            <h3>É assim que o artigo ficaria:</h3>
            <article v-html="text"></article>
        </section>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";

//ICONS
import Remove from "@/Pages/admin/Components/Icons/actions/Remove";
import Edit from "@/Pages/admin/Components/Icons/actions/Edit";
import Aprove from "@/Pages/admin/Components/Icons/actions/Aprove";
import See from "@/Pages/admin/Components/Icons/actions/See";

import scrollSmooth from "./functions/scrollSmooth";

export default {
    data() {
        return {
            messages: {},
            requires_list: {},
            text: "",
        };
    },
    props: {
        articlesToAnswear: Object,
        status: Object,
    },
    methods: {
        Refresh: function () {
            if (this.articlesToAnswear) {
                this.requires_list = this.articlesToAnswear;
            }
        },
        seeArticle: function (text) {
            this.text = text;
            var article = document.querySelector("#article_view"),
                vm = this;
            setTimeout(function () {
                scrollSmooth.scrollHere(article.scrollHeight);
            }, 400);
        },
        destroy: function(id){
            var article_id = id;
            this.$inertia.post(this.route('admin.destroyRequire'), {'id': article_id});
        },
        aprove: function(id){
            var article_id = id;
            this.$inertia.post(this.route('admin.aproveRequire'), {'id': article_id});
        }
    },
    created() {
        this.Refresh();
    },
    updated() {
        this.Refresh();
        this.text = "";
    },
    components: {
        AppAdmin,
        Aprove,
        Edit,
        Remove,
        See,
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/Layouts/mixin";

#requires_list {
    padding: 4vw;
    display: flex;
    flex-direction: column;
    gap: 4vw;

    .top {
        h3 {
            @include Titulo1_S;
            font-size: 3.5vw;
            line-height: 4vw;
        }
        p {
            @include Fonte1_SS;
            font-size: 1.3vw;
        }
    }
    .bottom {
        ul {
            display: flex;
            flex-direction: column;
            gap: 2vw;

            li {
                color: $black;

                .require_card {
                    background-color: $white;
                    border-radius: 1vw;
                    border-left: 5px solid $yellow;
                    padding: 2vw;

                    display: grid;
                    grid-template-columns: 9fr 1fr;

                    .informations_card {
                        .card_top {
                            h4 {
                                font-size: 1.4vw;
                            }
                            h2 {
                                @include Titulo1_S;
                                font-size: 3vw;
                            }
                        }
                        .card_center {
                            display: flex;
                            gap: 20%;

                            .open {
                                @include Titulo1_SS;
                                font-size: 1vw;
                                color: $green;
                            }
                            .subject {
                                @include Titulo2_SS;
                                font-size: 1.1vw;
                                color: $yellow;
                            }
                        }
                    }

                    .actions_card {
                        width: 100%;
                        height: 100%;

                        display: flex;
                        flex-direction: column;
                        justify-content: space-around;
                        align-items: flex-end;

                        .icons {
                            width: 1.5vw;
                            height: 1.5vw;

                            cursor: pointer;
                        }
                    }
                }
            }
        }
        h4 {
            @include Titulo2_S;
            font-size: 2vw;
        }
    }
}
#article_view {
    padding: 2vw;
    display: flex;
    flex-direction: column;
    margin-top: 6vw;

    h3 {
        @include Titulo2_S;
        font-size: 2vw;
        margin-bottom: 1vw;
    }
    article {
        background-color: $white;
        border-radius: 0.6vw;

        @include ArticleStyle();
    }
}
</style>
