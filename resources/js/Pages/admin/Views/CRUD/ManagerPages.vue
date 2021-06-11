<template>
    <inertia-head>
        <title>Alterar Páginas | Administrador</title>
    </inertia-head>

    <app-admin :atPage="'admin'" atSubpage="pages">
        <main id="man_pages">
            <section>
                <h3>Alteração de Páginas do Website</h3>
                <p>Função destinada apenas para altos Administradores.</p>
            </section>
            <section>
                <div v-for="(model, page) in pages" :key="page">
                    <change-card :page="page"></change-card>
                </div>
            </section>
        </main>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";
import ChangeCard from "@/Pages/admin/Components/CRUD/ChangeCard";

export default {
    created(){
        //
    },
    props:{
        pages: Array,
    },
    components: {
        AppAdmin,
        ChangeCard,
    },
};
</script>

<style></style>
