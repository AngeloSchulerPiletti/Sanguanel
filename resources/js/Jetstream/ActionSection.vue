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
.formsection_container {
    display: flex;

    padding: 3vw;
    gap: 3vw;

    .left {
        flex-shrink: 0;
        width: 40%;
    }
    .right {
        flex-grow: 1;
        border-radius: 0.5vw;
        padding: 2vw;
        background-color: $tinyback;

        color: $black;
    }
}
</style>
