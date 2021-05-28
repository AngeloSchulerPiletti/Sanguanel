<template>
    <div id="_website_">
        <navegation />
        <section id="_website_content_">
            <Header :header_content="header"/>
            <slot/>
        </section>
    </div>
</template> 

<script>
import InitialMenu from "@/Pages/public/Components/Template/InitialMenu";
// import {  } from "@/Pages/public/Components/T";

export default {
    components: {
        navegation: InitialMenu,
    },
    props: {

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
