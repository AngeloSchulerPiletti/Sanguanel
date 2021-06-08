<template>
    <app-admin :atPage="'account'" atSubpage="profile">
        <main>
            <section id="basic_infos">
                <inertia-link :href="route('account.profile.show')">Editar</inertia-link>
            </section>
            <section id="options">
                <inertia-link :href="route('account.profile.show')">Trocar Senha</inertia-link>
            </section>
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
        //
    },
};
</script>

<style lang="scss" scoped>

</style>
