<template>
    <div v-if="data[1] != undefined" id="instructions" @click="closeMe($event)">
        <div id="container">
            <h3>{{ instructions[data[0]][data[1]][0] }}</h3>
            <manual-pubs    v-if="data[0] == 'pubs'"        :wich="data[1]" />
            <manual-db      v-if="data[0] == 'db'"          :wich="data[1]"/>
            <modifier-db    v-if="data[0] == 'dbchange'"    :data="DBdata" @close="closeNow()"/>
            <modifier-pages v-if="data[0] == 'pageschange'" :data="DBdata" @close="closeNow()" :wich="data[1]" />
        </div>
    </div>
</template>

<script>
import ManualPubs from "@/Pages/admin/Components/CRUD/ManualPubs";
import ManualDb from "@/Pages/admin/Components/CRUD/ManualDB";
import ModifierDb from "@/Pages/admin/Components/CRUD/ModifierDB";
import ModifierPages from '@/Pages/admin/Components/CRUD/ModifierPages';

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
                db: [
                    ["Instruções Gerais"],
                ],
                dbchange: [
                    ["Alteração de Dados"],
                ],
                pageschange: {
                    institucional: ["Institucional"],
                    author: ["Página do Autor"],
                    subhomes: ["Artigos e Receitas"],
                }
            },
        };
    },
    props: {
        data: Array,
        DBdata: Array,
    },
    methods: {
        closeMe: function (event) {
            if (event.target.id == 'instructions') {
                this.$emit("meDelete");
            }
        },
        closeNow: function(){
            this.$emit("meDelete");
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
