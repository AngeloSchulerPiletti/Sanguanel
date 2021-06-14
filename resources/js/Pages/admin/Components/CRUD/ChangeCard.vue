<template>
    <div class="card_container">
        <div class="card_title">
            <h3>{{ card.title }}</h3>
        </div>
        <div class="actions">
            <edit class="icons edit" color="white" @click="emitAction"/>
            <inertia-link :href="card.route"><see class="icons see" color="white"/></inertia-link>
        </div>
    </div>
</template>

<script>
import Edit from "@/Pages/admin/Components/Icons/actions/Edit";
import See from "@/Pages/admin/Components/Icons/actions/See";

export default {
    data() {
        return {
            card: {
                title: "",
                route: "",
            },
            possiblesTitles: {
                institucional: ["Seções Institucionais", "/institucional"],
                author: ["Página do Autor", "/autor"],
                subhomes: ["Seções dos Artigos e Receitas", "/artigos/historia"],
                homes: ["Homes do site", "/artigos"],
            },
        };
    },
    created() {
        this.Refresh();
    },
    updated() {
        this.Refresh();
    },
    methods: {
        emitAction: function(){
            this.$emit('callChanges');
        },
        Refresh: function () {
            this.card.title = this.possiblesTitles[this.page][0];
            this.card.route = this.possiblesTitles[this.page][1];
        },
    },
    props: ["page"],
    components: {
        Edit,
        See,
    },
};
</script>

<style lang="scss" scoped>
.card_container {
    border-bottom: 2px solid $yellow;
    color: $white;

    display: grid;
    grid-template-columns: 9fr 1fr;
    align-items: flex-end;

    width: 80%;
    margin: auto;
    padding: 0vw 1.4vw 0vw 1vw;

    .card_title {
        h3{
            @include Titulo2_S;
            font-size: 2.6vw;
            text-transform: uppercase;
        }
    }
    .actions {
        display: flex;
        gap: 0.5vw;
        justify-content: flex-end;
        margin-bottom: 0.7vw;

        .icons {
            width: 1.4vw;
            height: 1.4vw;
            cursor: pointer;
        }
    }
}
</style>
