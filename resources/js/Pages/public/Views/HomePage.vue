<template>
    <!-- CABEÇALHO -->
    <inertia-head>
        <title>Início | Sanguanel</title>
        <meta
            name="description"
            content="Sanguanel, o maior editorial brasileiro sobre hidromel. Desde a história do hidromel até receitas de drinks. Crie sua conta, leia gratuitamente, discuta no fórum e escreva!"
        />
    </inertia-head>
    <!-- CABEÇALHO -->


    <app-public :header_content="header">
        <div id="website_home">
            <ranking />
            <newsletter />
        </div>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";
import Header from "@/Pages/public/Components/Template/Header";

import Ranking from "@/Pages/public/Components/Sections/home_page/Ranking";
import Newsletter from "@/Pages/public/Components/Sections/home_page/Newsletter";

export default {
    data() {
        return {
            header: {
                title: ["O Maior Editorial", "Hidromeleiro", "do Brasil"],
                style: "HomePages",
            },
            // messages: {},
        };
    },
    methods: {
        sendEmit: function () {
            this.$emit("sent-to-header");
        },
    },
    created(){
        //
    },
    components: {
        Ranking,
        Newsletter,
        Header,
        AppPublic,
    },
    props: {
        status: Object,
    },
};
</script>

<style lang="scss" scoped>
#website_home{
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
</style>
