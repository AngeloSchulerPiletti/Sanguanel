<template>
    <div v-if="data[1] != undefined" id="instructions">
        <h3>{{ instructions[data[0]][data[1]][0] }}</h3>
        <p>{{  instructions[data[0]][data[1]][1] }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            instructions: {
                pubs: [
                    ['Instruções Gerais', ''],
                    ['Autor',             ''],
                    ['Título',            ''],
                    ['Assunto',           ''],
                    ['Artigo',            ''],
                    ['Imagens',           ''],
                ],
            },
        };
    },
    props: {
        data: Array,
    },
};
</script>

<style></style>
