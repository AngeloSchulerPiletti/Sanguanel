<template>
    <app-public :header_content="header">
        <article v-html="article_data.text">
          
        </article>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";

export default {
    data() {
        return {
            article_data: {
                title: "",
                author: "",
                img_path: "",
                text: "",
                date: "",
            },
            header: {
                title: [""],
                style: "Contents",
                author: "",
                date: "",
            },
        };
    },
    components: {
        AppPublic,
    },
    props: {
        article: Object,
    },
    created() {
        this.header.title[0] = this.article.title;
        this.article_data.title = this.article.title;
        this.article_data.text = this.article.text;
        this.header.author = this.article.author;

        let lastDate = this.article.updated_at
            ? this.article.updated_at
            : this.article.created_at;

        var Reg = /-|T/;
        var date = lastDate.split(Reg);
        date.pop();

        this.header.date = date;
    },
};
</script>

<style lang="scss" scoped>
article {
    color: $black;
    padding: 2.4vw 2.4vw 2.4vw 2.4vw;

    & /deep/ .simple_p{
      @include Fonte1_SS;
      font-size: 1.3vw;
      text-align: justify;

      margin: 0.3vw 0 2vw 0;
    }
    & /deep/ .tiny_p{
      @include Fonte1_SS;
      font-size: 1.1vw;
      text-transform: uppercase;

      margin: 2vw 0 2vw 0;
    }
    & /deep/ a{
      @include anchorA($black, $yellow);
    }

    & /deep/ h1{
      @include Titulo1_S;
      font-size: 2.2vw;
      text-transform: uppercase;
    }
    & /deep/ h2{
      @include Titulo2_S;
      font-size: 1.9vw;
      text-transform: uppercase;
    }
    & /deep/ h3{
      @include Titulo2_SS;
      font-size: 1.7vw;
      text-transform: capitalize;
    }
    & /deep/ h4{
      @include Titulo2_S;
      font-size: 1.6vw;
      text-transform: capitalize;

    }
    & /deep/ h5{
      @include Fonte1_S;
      font-size: 1.5vw;
      text-transform: capitalize;

    }
    & /deep/ h6{
      @include Fonte1_SS;
      font-size: 1.4vw;
      text-transform: capitalize;

    }

    & /deep/ .elegant_hr{
      outline: none;
      border: none;
      height: 1px;
      background-color: $black;
      margin: 1vw auto 1vw auto;
    }

    & /deep/ .img_container{
      margin: 2vw 0 2vw 0;

      .img_alternative{
        @include Fonte2_SS;
        text-transform: capitalize;
        font-size: 1vw;

        margin-top: 0.5vw;
      }


      img{
        border: 2px solid $black;
      }
      .big-left{

      }
      .medium-left{
        width: 40vw;
      }
      .small-left{

      }


      .big-center{

      }
      .medium-center{

      }
      .small-center{
        
      }


      .big-right{

      }
      .medium-right{

      }
      .small-right{
        
      }
    }

}
</style>
