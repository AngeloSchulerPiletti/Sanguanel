<template>
<app-admin :atPage="'admin'" :atManager="'database'">
  Manager DB
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