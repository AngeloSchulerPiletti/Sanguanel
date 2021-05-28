<template>
  <app-public>
    <p>ARTIGOS MODELO</p>
    <!-- <article>
      <Header :articleData="articleContent.articleData"/>
      Artigos
    </article> -->
  </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";
import Header from "@/Pages/public/Components/Template/ArticlesModel/Header";
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
      AppPublic,
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