<template>
    <section v-if="wich === 0">
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
        <p>Preste muita atenção ao escrever o artigo. Confira se não há erros de português e se a formatação está de acordo.</p>
        <p>Em se tratando da formatação, atente-se para as seguintes regras:</p>
        <ul>
            <li>Use "#" antes e depois de uma frase para ela ser considerada um "h1". Use "##" para h2 e assim sucessivamente até o h6;</li>
            <li>Use "*" antes e depois para <i>itálico</i>;</li>
            <li>Use "**" antes e depois para <b>bold</b>;</li>
            <li>Use "^" antes e depois para uma frase 25% menor;</li>
            <li>Use "^^" antes e depois para uma frase 50% menor; </li>
            <li>Use "'''" antes e depois para uma formatação bonita de quote;</li>
            <li>Use "--" antes para listar itens de uma lista;</li>
            <li>Use "$$site[https://site.com.br]$$" para criar um link personalizado;</li>
        </ul>
        <p>Em se tratando de novos elementos:</p>
        <ul>
            <li>Use "`[]`" para adicionar uma propaganda;</li>
            <li>Use "`{classe}`" para adicionar uma imagem (veja a info das imagens para mais infos);</li>
        </ul>
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
        <p>As imagens devem ser adicionadas na ordem em que forem aparecer no artigo!</p>
        <p>Algumas classes de imagens:</p>
        <ul>
            <li>big-left</li>
            <li>medium-left</li>
            <li>small-left</li>
        </ul>
        <ul>
            <li>big-center</li>
            <li>medium-center</li>
            <li>small-center</li>
        </ul>
        <ul>
            <li>big-right</li>
            <li>medium-right</li>
            <li>small-right</li>
        </ul>
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
