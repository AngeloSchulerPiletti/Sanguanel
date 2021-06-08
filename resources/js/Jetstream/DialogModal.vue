<template>
    <modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div id="dialog_container">
            <div class="containers top">
                <h3>
                    <slot name="title"> </slot>
                </h3>

                <div>
                    <slot name="content"> </slot>
                </div>
            </div>

            <div class="containers bottom">
                <slot name="footer"> </slot>
            </div>
        </div>
    </modal>
</template>

<script>
import Modal from "./Modal";

export default {
    emits: ["close"],

    components: {
        Modal,
    },

    props: {
        show: {
            default: false,
        },
        maxWidth: {
            default: "2xl",
        },
        closeable: {
            default: true,
        },
    },

    methods: {
        close() {
            this.$emit("close");
        },
    },
};
</script>

<style lang="scss" scoped>
#dialog_container {
    display: flex;
    flex-direction: column;

    .containers {
        padding: 1.5vw;
    }
    .top {
        display: flex;
        flex-direction: column;
        gap: 1vw;
        h3 {
            @include Titulo2_S;
            font-size: 2vw;
        }
    }
    .bottom {
        background-color: $tinyback;
    }
}
</style>
