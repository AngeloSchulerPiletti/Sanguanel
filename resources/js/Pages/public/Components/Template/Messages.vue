<template>
    <div id="messages" v-for="(message, key) in errorsToShow" :key="key">
        <div
            :id="toClose"
            class="message"
            v-if="message != null"
            @click="closeMessage(key)"
        >
            <div id="aviso">
                <h6>AVISO</h6>
                <button id="close">X</button>
            </div>
            <span>{{ message }}</span>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            toClose: "no",
            errorsToShow: {},
        };
    },
    props: {
        errors: Object,
    },
    methods: {
        closeMessage: function (key) {
            this.$data.toClose = "yes";
            delete this.$data.errorsToShow[key];

            // setTimeout(function () {
            //     document.getElementById("yes").style.display = "none";
                // vm.key = undefined;
                // console.log(this.$data.errorsToShow);

            // }, 500);

            
        },
    },
    updated() {
        this.errorsToShow = this.errors;
        console.log(this.errors);
        this.toClose = "no";
    },
};
</script>

<style lang="scss" scoped>
.message {
    position: fixed;
    display: flex;
    flex-direction: column;
    overflow: hidden;

    width: 20vw;
    height: fit-content;
    z-index: 10000000;

    padding: 0.6vw;
    top: 1vw;
    left: calc($menuWidth + 1vw);

    border-radius: 0.4vw;
    background-image: linear-gradient(225deg, #ffd000, #fffb00, $yellow);
    opacity: 0.95;
    box-shadow: -2px 3px 4px $gray2;

    #aviso {
        display: flex;
        justify-content: space-between;
        width: 100%;
        color: $black;

        margin-bottom: 0.3vw;
        h6 {
            @include Titulo2_S();
            font-size: 1.2vw;
        }
        #close {
            font-size: 1.2vw;
            @include Titulo1_SS();
            margin-right: 0.3vw;
            &:focus {
                border: none;
                outline: none;
            }
        }
    }

    transition-property: transform, opacity;
    transition-duration: 200ms;

    span {
        @include Fonte1_SS();
        font-size: 1.2vw;
        color: $black;
    }
}
#yes {
    opacity: 0;
    transform: translateY(-1vw);
}
</style>
