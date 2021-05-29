<template>
  <app-public :header_content="header">
    <p>AUTOR</p>
  </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";


export default {
  data(){
    return{
            header: {
                'title': ["Pazer, sou o", "Angelo", ""],
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