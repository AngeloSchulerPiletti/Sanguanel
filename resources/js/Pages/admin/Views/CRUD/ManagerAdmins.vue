<template>
<app-admin :atPage="'admin'" :atManager="'admins'">
  Manager Admins
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