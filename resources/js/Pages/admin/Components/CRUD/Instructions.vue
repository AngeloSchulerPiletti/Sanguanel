<template>
    <div v-if="data[1] != undefined" id="instructions" @click="closeMe($event)">
        <div>
            <h3>{{ instructions[data[0]][data[1]][0] }}</h3>
            <manual :wich="data[1]" />
        </div>
    </div>
</template>

<script>
import Manual from "@/Pages/admin/Components/CRUD/Manual";

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
                ],
                db: [
                    [''],
                ],
            },
        };
    },
    props: {
        data: Array,
    },
    methods: {
        closeMe: function (event) {
            if (event.path.length <= 9) {
                this.$emit("meDelete");
            }
        },
    },
    components: {
        Manual,
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

    div {
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
