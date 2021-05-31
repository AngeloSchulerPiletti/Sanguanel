<template>
    <input :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                console.log(this.modelValue);
                this.$refs.input.focus()
            }
        }
    }
</script>

