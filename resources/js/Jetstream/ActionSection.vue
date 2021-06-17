<template>
    <div class="formsection_container">
        <section class="left">
            <jet-section-title>
                <template #title><slot name="title"></slot></template>
                <template #description
                    ><slot name="description"></slot
                ></template>
            </jet-section-title>
        </section>

        <section class="right">
            <div class="">
                <div class="">
                    <slot name="content"></slot>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import JetSectionTitle from "./SectionTitle";

export default {
    components: {
        JetSectionTitle,
    },
};
</script>

<style lang="scss" scoped>
@import 'resources/css/sass/admin/Components/profile';
@include profileConfig();
</style>
