<template>
  <app-public :header_content="header">
    <article>
      {{article_data.text}}
    </article>
  </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";

export default {
    data(){
      return{
      article_data:{
        title: "",
        author: "",
        img_path: "",
        text: "",
        date: "",
      },  
      header: {
                title: [""],
                style: 'Contents',
                author: "",
                date: "",
      },
      }
    },
    components: {
      AppPublic,
      
    },
    props:{
      article: Object,
    },
    created(){
      this.header.title[0] = this.article.title;
      this.article_data.title = this.article.title;
      this.article_data.text = this.article.text;
      this.header.author = this.article.author;

      var Reg = /-|T/;
      var date = this.article.updated_at.split(Reg);
      date.pop();
      
      this.header.date = date;
    },
};
</script>

<style lang="scss" scoped>
article{
  color: $black;
}
</style>