<template>
    <div id="_website_">
        <navigation />
        <section id="_website_content_">
            <Header :header_content="header_content"/>
            <main>
                <slot></slot>
            </main>
            
        </section>
    </div>
</template> 

<script>
import Navigation from "@/Pages/public/Components/Template/Navigation";
import Header from "@/Pages/public/Components/Template/Header";

export default {
    data(){
        return{
        }
    },
    components: {
        Navigation,
        Header,
    },
    methods:{
        //
    },
    props: {
        header_content: Object,
    },
    
};
</script>

<style lang="scss" scoped>

#_website_ {
    display: flex;

    navigation{
        flex-grow: 0;
        flex-shrink: 0;
    }
    #_website_content_ {
        flex-grow: 1;
        flex-shrink: 1;

        margin-left: $menuWidth;

        main{
            border: 3px solid $white;
        }
    }
}
</style>
