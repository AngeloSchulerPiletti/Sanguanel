<template>
    <div
        v-if="usefulData[1] != undefined"
        id="instructions"
        @click="closeMe($event, usefulData[0])"
    >
        <div id="container">
            <h3>{{ instructions[usefulData[0]][usefulData[1]][0] }}</h3>
            <manual-pubs v-if="usefulData[0] == 'pubs'" :wich="usefulData[1]" />
            <manual-db v-if="usefulData[0] == 'db'" :wich="usefulData[1]" />
            <modifier-db
                v-if="usefulData[0] == 'dbchange'"
                :data="DBdata"
                @close="closeNow()"
            />
            <modifier-pages
                v-if="usefulData[0] == 'pageschange'"
                :data="DBdata"
                @close="closeNow()"
                :wich="usefulData[1]"
                @instructions="doublePop"
            />
        </div>
    </div>
</template>

<script>
import ManualPubs from "@/Pages/admin/Components/CRUD/ManualPubs";
import ManualDb from "@/Pages/admin/Components/CRUD/ManualDB";
import ModifierDb from "@/Pages/admin/Components/CRUD/ModifierDB";
import ModifierPages from "@/Pages/admin/Components/CRUD/ModifierPages";

export default {
    data() {
        return {
            instructions: {
                pubs: [
                    ["Instruções Gerais"],
                    ["Autor"],
                    ["Título"],
                    ["Assunto"],
                    ["Artigo"],
                    ["Imagens"],
                    ["Descrição"],
                    ["Palavras-Chaves"],
                ],
                db: [["Instruções Gerais"]],
                dbchange: [["Alteração de Dados"]],
                pageschange: {
                    institucional: ["Institucional"],
                    author: ["Página do Autor"],
                    subhomes: ["Artigos e Receitas"],
                    homes: ["Homes: Artigos, Receitas e Institucional"],
                },
            },
            usefulData: [],
        };
    },
    props: {
        data: Array,
        DBdata: Array,
    },
    methods: {
        closeMe: function (event, wich = null) {
            if (event.target.id == "instructions") {
                this.usefulData[1] = undefined;
                this.usefulData[0] = wich;
                this.$emit('closeMe', [wich, undefined]);
            }
        },
        closeNow: function (wich = null) {
            this.usefulData[1] = undefined;
            this.usefulData[0] = wich;
        },
        doublePop(wich) {
            this.usefulData = wich;
        },
    },
    created() {
        if (this.data) {
            this.usefulData = this.data;
        }
    },
    updated(){
        if (this.usefulData[0] == this.data[0]) {
            this.usefulData = this.data;
        }
    },
    components: {
        ManualPubs,
        ManualDb,
        ModifierDb,
        ModifierPages,
    },
};
</script>

<style lang="scss" scoped>
#instructions {
    position: fixed;

    left: 0;
    right: 0;
    top: 0;
    bottom: 0;

    background-color: #000000d0;

    #container {
        width: 80%;
        margin: auto;
        margin-top: 6vw;

        padding: 3vw;

        border-radius: 2vw;
        background-color: $white;

        h3 {
            @include Titulo2_S;
            font-size: 3vw;
            text-transform: uppercase;
            color: $black;
            margin-bottom: 1.4vw;
        }
    }
}
</style>
