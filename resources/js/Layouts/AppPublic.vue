<template>
    <div id="_website_">
        <navegation />
        <section id="_website_content_">
            <Header :header_content="header_content"/>
            <slot></slot>
        </section>
    </div>
</template> 

<script>
import InitialMenu from "@/Pages/public/Components/Template/InitialMenu";
import Header from "@/Pages/public/Components/Template/Header";

export default {
    data(){
        return{
            // header: [
            //     "O Maior Editorial",
            //     "Hidromeleiro",
            //     "do Brasil",
            // ],
        }
    },
    components: {
        navegation: InitialMenu,
        Header,
    },
    methods:{
        // headerSetContent: function(){
        //     console.log('recebendo $emit!');
        // },
    },
    props: {
        header_content: Object,
    },
    
};
</script>

<style lang="scss" scoped>

#_website_ {
    display: flex;

    navegation{
        flex-grow: 0;
        flex-shrink: 0;
    }
    #_website_content_ {
        flex-grow: 1;
        flex-shrink: 1;

        margin-left: $menuWidth;
    }
}
</style>
