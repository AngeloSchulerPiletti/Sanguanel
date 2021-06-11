<template>
    <inertia-head>
        <title>Institucional | {{name}}</title>
        <!-- <meta name="description" :content="database.description"> -->
    </inertia-head>

<app-public :header_content="header">
  <p>FROM INSTITUCIONAL</p>
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
            'exposicao':   ['Exposição',                 ['Uma pequena', 'Declaração']],
            'politica':    ['Política de Privacidade',   ['Somos Cristalinos como um ', 'Bom Hidromel']],
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

        this.header.title = content[assunto][1];   
        this.name = content[assunto][0];
    }
}
</script>

<style>

</style>