<template>
<app-public>
     <p>FROM ARTIGOS</p>
</app-public>
 
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";

export default {
    props:{
        subject: String,
    },
    components:{
        AppPublic,
    },
    created(){
        console.log(this.subject);
    }
}
</script>

<style>

</style>