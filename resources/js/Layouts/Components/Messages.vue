<template>
    <div id="messages_container">
        <div
            class="message_container"
            v-for="(message, key) in messagesToShow"
            :key="key"
        >
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
    </div>
</template>

<script>
export default {
    data() {
        return {
            toClose: "no",
            messagesToShow: {},
        };
    },
    props: {
        errors: Object,
        status: Object,
    },
    methods: {
        closeMessage: function (key) {
            this.$data.toClose = "yes";
            delete this.$data.messagesToShow[key];
        },
        check: function () {
                var errorsLen = Object.keys(this.errors).length;
                if (this.status) {
                    var statusLen = Object.keys(this.status).length;
                } else {
                    var statusLen = 0;
                }

                if (errorsLen > 0 && statusLen > 0) {
                    this.messagesToShow = { ...this.errors, ...this.status };
                    this.cleanMessages();
                } else if (statusLen > 0) {
                    this.messagesToShow = this.status;
                    this.cleanMessages();
                } else if (errorsLen > 0) {
                    this.messagesToShow = this.errors;
                    this.cleanMessages();
                }
                this.toClose = "no";
            
        },
        cleanMessages: function () {
            setTimeout(() => {
                var messages = document.querySelectorAll(".message_container"),
                    MLength = messages.length,
                    wait = 1300;

                for (let i = MLength-1; i >= 0; i--) {
                    setTimeout(() => {
                        messages[i].classList.add("closing");
                    }, wait * (-i + MLength - 1));
                }

                setTimeout(() => {
                    Object.keys(this.$data.messagesToShow).forEach(key => {
                        delete this.$data.messagesToShow[key];
                    });
                }, (MLength*wait) + 100);

                
            }, 3200);
        },
    },
    mounted() {
        this.check();
    },
    updated() {
        this.check();
    },
};
</script>

<style lang="scss" scoped>
#messages_container {
    position: fixed;
    z-index: 10000000;
    top: 1vw;
    left: 1.5vw;

    display: flex;
    flex-direction: column;

    gap: 0.6vw;

    .message_container {
        .message {
            display: flex;
            flex-direction: column;
            overflow: hidden;

            width: 20vw;
            height: fit-content;

            cursor: pointer;

            padding: 0.6vw;

            border-radius: 0.4vw;
            background-image: linear-gradient(225deg, #cdcdcd, #ffffff);
            border-left: 4px solid $yellow;
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

        transition-duration: 300ms;
        transition-property: opacity;

        &.closing {
            opacity: 0;
        }
    }
}

/*+----------------------------------------+
  |           RESPONSIVIDADE               |
  +----------------------------------------+ */
@media (max-width: 1100px) {
    #messages_container {
        top: 1.5vw;
        left: 1.5vw;

        gap: 0.8vw;

        .message_container {
            .message {
                width: 28vw;

                padding: 1vw;

                border-radius: 0.6vw;

                #aviso {
                    margin-bottom: 0.5vw;
                    h6 {
                        font-size: 1.9vw;
                    }
                    #close {
                        font-size: 1.5vw;
                        margin-right: 0.7vw;
                    }
                }

                span {
                    font-size: 1.6vw;
                }
            }
        }
    }
}
@media (max-width: 700px) {
    #messages_container {
        top: 2vw;
        left: 1.8vw;

        gap: 1.6vw;

        .message_container {
            .message {
                width: 45vw;

                padding: 1.4vw;

                border-radius: 1vw;

                #aviso {
                    margin-bottom: 0.8vw;
                    h6 {
                        font-size: 3vw;
                    }
                    #close {
                        font-size: 2.5vw;
                        margin-right: 0.9vw;
                    }
                }

                span {
                    font-size: 2.8vw;
                }
            }
        }
    }
}
@media (max-width: 500px) {
    #messages_container {
        top: 3.6vw;
        left: 2.1vw;

        gap: 2.2vw;

        .message_container {
            .message {
                width: 55vw;

                padding: 2vw;

                border-radius: 1vw;

                #aviso {
                    margin-bottom: 0.8vw;
                    h6 {
                        font-size: 4vw;
                    }
                    #close {
                        font-size: 3.5vw;
                        margin-right: 1.2vw;
                    }
                }

                span {
                    font-size: 3.6vw;
                }
            }
        }
    }
}
</style>
