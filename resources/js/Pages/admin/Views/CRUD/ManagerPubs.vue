<template>
<app-admin :atPage="'admin'" :atManager="'pubs'">
  Manager Pubs
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