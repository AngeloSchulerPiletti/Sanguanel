<template>
    <section v-if="wich === 0">
        <p>Aqui você tem acesso a quase toda a base de dados do site e poderá realizar pequenas modifcações.</p>
        <p>
            Clique na linha em que você deseja alterar
        </p>
    </section>
</template>

<script>
export default {
    props: {
        wich: Number,
    },
};
</script>

<style lang="scss" scoped>
section{
    height: 50vh;
    overflow-y: auto;
}
p,
li {
    @include Fonte1_S;
    font-size: 1.4vw;
}
p, a{
    color: $gray2;
}
ul {
    margin: 1vw 0 1vw 0;
    li {
        text-indent: 2em;
        color: $yellow;
    }
}
a{
    text-decoration: underline;

    @include anchorT($gray2, $yellow);
}
</style>
