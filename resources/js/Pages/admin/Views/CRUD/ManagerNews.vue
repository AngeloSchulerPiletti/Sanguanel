<template>
    <inertia-head>
        <title>Newsletter | Administrador</title>
    </inertia-head>

<app-admin :atPage="'admin'" atSubpage="news">
  <section id="man_news">

    </section>
</app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";

export default {
components:{
    AppAdmin,
}
}
</script>

<style>

</style>