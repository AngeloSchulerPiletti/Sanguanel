<template>
    <inertia-head>
        <title>Alterar Páginas | Administrador</title>
    </inertia-head>

    <app-admin :atPage="'admin'" atSubpage="pages">
        <main id="man_pages">
            <section id="intro_sec">
                <h3>Alteração de Páginas do Website</h3>
                <p>Função destinada apenas para altos Administradores.</p>
            </section>
            <section id="cards_sec">
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

<style lang="scss" scoped>
#man_pages{
    display: flex;
    flex-direction: column;
    gap: 10vw;
    margin-bottom: 10vw;

    #intro_sec{
        margin-top: 6vw;
        text-align: center;

        h3{
            @include Titulo2_S;
            font-size: 3.5vw;
        }
        p{
            @include Fonte1_SS;
            font-size: 1.3vw;
        }
    }
    #cards_sec{
        display: flex;
        flex-direction: column;
        gap: 5vw;
    }
}
</style> 
