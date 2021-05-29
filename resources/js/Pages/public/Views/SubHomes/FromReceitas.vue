<template>
<app-public :header_content="header">
  <p>FROM RECEITAS</p>
</app-public>
  
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";

export default {
  data(){
    return{
       header: {
            'title': "",
            'style': 'SubHomePages',
        },
        acceptSubjects: {
            'comidas':     ['Comidas',     ['Hidromel e', 'Muita Comida']],
            'drinks':      ['Drinks',      ['Hidromel nos teus', 'Drinks']],
        }
    }
  },
  components:{
    AppPublic
  },
 props:{
        subject: String,
    },
     created(){
        var assunto = this.subject,
            content = this.acceptSubjects;

        this.header.title = content[assunto][1];   
    }
}
</script>

<style>

</style>