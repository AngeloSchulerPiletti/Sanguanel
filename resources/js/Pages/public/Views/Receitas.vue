<template>
  <app-public :header_content="header">
    <p>RECEITAS</p>
  </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";
export default {
  data(){
    return{
      
            header: {
                'title': ["Agora, tuas", "Receitas", "com hidromel"],
                'style': 'HomePages',
            },
    }
  },
  components: {
      AppPublic,
  }
}
</script>

<style>

</style>