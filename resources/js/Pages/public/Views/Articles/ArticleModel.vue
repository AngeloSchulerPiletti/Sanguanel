<template>
  <app-public :header_content="header">
    <p>ARTIGOS MODELO</p>
   
  </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";

export default {
    data(){
      return{
      header: {
                'title': ["XXXXXXXXXXx"],
                'style': 'Contents',
            },
      }
    },
    components: {
      AppPublic,
      
    },
    props:{
      article: Number,
      // articleJSON: Object,
    }
};
</script>

<style lang="scss" scoped>

</style>