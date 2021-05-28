<template>
  <app-public>
    <div id="website_home">
      <Header :header="header"/>
    </div>
    <p>AUTOR</p>
  </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";
import Header from "@/Pages/public/Components/Template/Header";


export default {
  data(){
    return{
      header: [

      ],
    }
  },
  components: {
      AppPublic,
      Header,
  }
}
</script>

<style>

</style>