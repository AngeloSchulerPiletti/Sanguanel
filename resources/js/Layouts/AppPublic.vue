<template>
    <inertia-head>
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Merriweather:wght@200;400;700;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400&display=wrap"
        />
    </inertia-head>

    <div id="_website_">
        <div id="blocker" v-if="toBlock == 'yes'" @click="$refs.navigation.menuCall()"></div>
        <navigation id="navigation_menu" @toBlock="toBlockChange" ref="navigation"/>
        <messages :errors="$page.props.errors" :status="$page.props.status" />
        <!-- <share-button v-if="$page.url != '/'"/> -->

        <section id="_website_content_">
            <Header :header_content="header_content" />
            <main>
                <slot></slot>
            </main>
        </section>
    </div>
</template>

<script>
import Navigation from "@/Pages/public/Components/Template/Navigation";
import Header from "@/Pages/public/Components/Template/Header";
import Messages from "@/Layouts/Components/Messages";
// import ShareButton from '@/Layouts/Components/ShareButton.vue';

export default {
    data() {
        return {
            toBlock: "no",
        };
    },
    components: {
        Navigation,
        Header,
        Messages,
        // ShareButton,
    },
    created() {},
    updated() {},
    methods: {
        toBlockChange(arg){
            this.toBlock = arg;
        },
    },
    props: {
        header_content: Object,
        
    },
};
</script>

<style lang="scss" scoped>
#_website_ {
    display: flex;

    #blocker{
        display: none;
    }
    #navigation_menu {
        flex-grow: 0;
        flex-shrink: 0;
    }
    #_website_content_ {
        flex-grow: 1;
        flex-shrink: 1;

        margin-left: $menuWidth;

        transform-style: preserve-3d;

        main {
            border: 3px solid $white;
            z-index: 1;
            transform: translateZ(-10vw);
        }
    }
}

/*+-----------------------------------------------------+
  |                RESPONSIVIDADE                       |
  +-----------------------------------------------------+*/
@media (max-width: 1300px) {
    //
}
@media (max-width: 1100px) {
    #_website_ {
        #_website_content_ {
            margin-left: $menuWidth2;
        }
    }
}
@media(max-width: 700px){
    #_website_ {
        #blocker{
                background-color: $black;
                opacity: 0.6;
                z-index: 1000;

                display: block;
                position: fixed;
                right: 0;
                left: 0;
                bottom: 0;
                top: 0;
                
        }
        #_website_content_ {
            margin-left: 0;
        }
    }
}
</style>
