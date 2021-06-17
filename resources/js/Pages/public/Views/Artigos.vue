<template>
  <!-- CABEÇALHO DA PÁGINA -->
    <inertia-head>
        <title>Sanguanel | Artigos</title>
        <meta
            name="description"
            :content="database.description"
        />
    </inertia-head>
    <!-- CABEÇALHO DA PÁGINA -->

    <app-public :header_content="header">
        <article v-html="database.text"></article>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";
import Header from "@/Pages/public/Components/Template/Header";

export default {
    data(){
      return{
            header: {
                'title': ["Aqui há", "Conhecimento", "e hidromel"],
                'style': 'HomePages',
            },

      }
    },
    components: {
      AppPublic,
      Header,
      
    },
    props:{database: Object},
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/Layouts/mixin";

article {
    @include ArticleStyle();
}
</style>
