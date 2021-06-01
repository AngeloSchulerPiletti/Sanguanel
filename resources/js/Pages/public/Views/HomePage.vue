<template>
    <app-public :header_content="header">
        <div id="website_home">
            <messages :flashes="flash" />


            <ranking/>
            <newsletter/>
        </div>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";
import Header from "@/Pages/public/Components/Template/Header";
import Messages from "@/Pages/public/Components/Template/Messages";

import Ranking from "@/Pages/public/Components/Sections/home_page/Ranking";
import Newsletter from "@/Pages/public/Components/Sections/home_page/Newsletter";


export default {
    data() {
        return {
            header: {
                'title': ["O Maior Editorial", "Hidromeleiro", "do Brasil"],
                'style': 'HomePages',
            },
        };
    },
    props: {
        flash: Object,
    },
    methods: {
        sendEmit: function () {
            this.$emit("sent-to-header");
        },
    },
    components: {
        Ranking,
        Newsletter,
        Header,
        AppPublic,
        Messages,
    },
};
</script>

<style lang="scss" scoped>
</style>
