<template>
    <div id="_website_">
        <Menu/>
        <section id="_website_content_">
            <slot/>
        </section>
    </div>
</template>

<script>
import Menu from "../Components/Template/Session/Menu";
export default {
    props: {
        // errors: Object,
    },
    components: {
        Menu,
    },
};
</script>

<style lang="scss" scoped>

</style>
