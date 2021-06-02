<template>
    <section v-if="wich == 0">
        <p>Aqui você poderá inserir novos artigos no website.</p>
        <p>Os campos obrigatórios são:</p>
        <ul>
            <li>Autor;</li>
            <li>Título;</li>
            <li>Assunto;</li>
            <li>Artigo;</li>
        </ul>
        <p>
            Ao clicar no símbolo de info, você receberá uma tela como esta dando
            mais instruções sobre o campo.
        </p>
    </section>
    <section v-else-if="wich == 1">
        <p>
            Nesse campo você deve preencher seu nome completo ou, se quiser, um
            pseudônimo.
        </p>
    </section>
    <section v-else-if="wich == 2">
        <p>Dê um título à obra.</p>
    </section>
    <section v-else-if="wich == 3">
        <p>
            Selecione o assunto que mais se encaixa no seu artigo. Caso nenhum
            assunto para o ideal, repense seu artigo...
        </p>
    </section>
    <section v-else-if="wich == 4">

    </section>
    <section v-else-if="wich == 5">
        <p>
            Os formatos de imagens são: JPG, JPEG, PNG e GIF. Tamanho máximo:
            800 Kb. Caso seja necessário minificar sua imagem, acesse o site
            <a
                href="http://tinypng.com"
                target="_blank"
                rel="noopener noreferrer"
                >TinyPNG</a
            >.
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
