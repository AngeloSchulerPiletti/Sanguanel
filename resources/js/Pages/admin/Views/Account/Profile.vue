<template>
    <app-admin :atPage="'account'" atSubpage="profile">
        <main>
            Profile
        </main>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";

export default {
    components: {
        AppAdmin,
    },
    props:[
        'user_data'
    ],
    created(){
        console.log(this.user_data);
    },
};
</script>

<style lang="scss" scoped>

</style>
