<template>
    <inertia-head>
        <title>Receitas | {{name}}</title>
        <!-- <meta name="description" :content="database.description"> -->
    </inertia-head>

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
        },
        name: "",
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

        this.name = content[assunto][0]
        this.header.title = content[assunto][1];   
    }
}
</script>

<style>

</style>