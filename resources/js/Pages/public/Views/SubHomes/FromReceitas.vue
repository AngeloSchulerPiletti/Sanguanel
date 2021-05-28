<template>
<app-public>
  <p>FROM RECEITAS</p>
</app-public>
  
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";

export default {
  components:{
    AppPublic
  },
 props:{
        subject: String,
    },
    created(){
        console.log(this.subject);
    }
}
</script>

<style>

</style>