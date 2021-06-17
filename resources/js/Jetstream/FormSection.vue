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
            <form @submit.prevent="$emit('submitted')">
                <div
                    :class="
                        hasActions
                            ? 'sm:rounded-tl-md sm:rounded-tr-md'
                            : 'sm:rounded-md'
                    "
                >
                    <div>
                        <!-- Formulário vai aqui -->
                        <slot name="form"></slot>
                    </div>
                </div>

                <div v-if="hasActions">
                    <slot name="actions"></slot>
                </div>
            </form>
        </section>
    </div>
</template>

<script>
import JetSectionTitle from "./SectionTitle";

export default {
    emits: ["submitted"],

    components: {
        JetSectionTitle,
    },

    computed: {
        hasActions() {
            return !!this.$slots.actions;
        },
    },
};
</script>

<style lang="scss" scoped>
@import 'resources/css/sass/admin/Components/profile';
@include profileConfig();
</style>
