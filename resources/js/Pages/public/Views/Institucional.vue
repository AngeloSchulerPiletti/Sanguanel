<template>
  <!-- CABEÇALHO DA PÁGINA -->
    <inertia-head>
        <title>Sanguanel | Institucional</title>
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
export default {
  data(){
    return{
      
            header: {
                'title': ["Um pouco", "Sobre", "esse projeto"],
                'style': 'HomePages',
            },
    }
  },
  props:{
      database: Object,
  },
  components: {
      AppPublic,
  }
}
</script>

<style lang="scss" scoped>
@import "resources/css/sass/Layouts/mixin";

article {
    @include ArticleStyle();
}
</style>