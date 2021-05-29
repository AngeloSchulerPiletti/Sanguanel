<template>
    <app-admin :isHere="'dashboard'">
        DASHBOARD
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";

    export default {
        components: {
            AppAdmin,
        },
    }
</script>
