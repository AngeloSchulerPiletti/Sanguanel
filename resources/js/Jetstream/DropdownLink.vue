<template>
    <div>
        <button type="submit" v-if="as == 'button'">
            <slot></slot>
        </button>

        <a :href="href" v-else-if="as == 'a'">
            <slot></slot>
        </a>

        <inertia-link :href="href" v-else>
            <slot></slot>
        </inertia-link>
    </div>
</template>

<script>
export default {
    props: ["href", "as"],
};
</script>

<style lang="scss" scoped>
button,
a {
    &:active,
    &:target,
    &:focus {
        border: none;
        outline: none;
    }
}
</style>
