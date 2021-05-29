<template>
  <app-public :header_content="header">
    <p>ARTIGOS</p>
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
    props:{
    }
};
</script>

<style lang="scss">

</style>
