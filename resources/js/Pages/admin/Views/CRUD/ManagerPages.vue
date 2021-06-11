<template>
    <inertia-head>
        <title>Alterar Páginas | Administrador</title>
    </inertia-head>

<app-admin :atPage="'admin'" atSubpage="pages">
  <section id="man_pages">

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