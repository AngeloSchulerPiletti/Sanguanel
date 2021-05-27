<template>
  <App>
    <article>
      <Header :articleData="articleContent.articleData"/>
      Artigos
    </article>
  </App>
</template>

<script>
import App from "@/Layouts/App";
import Header from "@/Pages/Components/Template/ArticlesModel/Header";
export default {
    data(){
      return{
        articleContent:{
          articleData: [
            "O Bom Hidromel",
            "25/07/2021"
          ],
        }
      }
    },
    components: {
      App,
      Header,
      ModeloArtigo: ArticleModel,
      
    },
    props:{
      article: Number,
      // articleJSON: Object,
    }
};
</script>

<style lang="scss">

</style>