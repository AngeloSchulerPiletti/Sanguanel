<template>
  <app-public :header_content="header">
    <p>INSTITUCIONAL</p>
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
  components: {
      AppPublic,
  }
}
</script>

<style>

</style>