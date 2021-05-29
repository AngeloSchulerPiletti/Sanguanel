<template>
<app-public :header_content="header">
     <p>FROM ARTIGOS</p>
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
            'producao':     ['Produção',     ['O Hidromel e sua', 'Produção']],
            'historia':     ['História',     ['O Hidromel e sua grande', 'História']],
            'curiosidades': ['Curiosidades', ['Tudo o quê você', 'Não sabe']],
        }
        
    }
  },
    props:{
        subject: String,
    },
    components:{
        AppPublic,
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