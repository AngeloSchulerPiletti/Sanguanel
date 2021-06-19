<template>
    <section id="newsletter" data-state="none">
        <div id="subscription">
            <div class="top">
                <h3>NEWSLETTER</h3>
                <p>
                    Ao assinar nossa newsletter gratuita você receberá
                    informações relevantes por e-mail assim como promoções de
                    hidromeis que acharmos interessantes!
                </p>

                <h6>Regularidade: Até 1x por semana</h6>
            </div>
            <div class="bottom">
                <form @submit.prevent="submit">
                    <input
                        v-model="cadastro.email"
                        placeholder="Email"
                        type="email"
                        name="email"
                    />
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
        <div id="viking">
            <img src="/images/homes/home/viking.png" alt="" />
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            cadastro: this.$inertia.form({
                email: "",
            }),
        };
    },
    methods: {
        submit() {
            this.cadastro.post(this.route("newsletter"), {
                onFinish: () => this.cadastro.reset("email"),
            });
        },
    },
    mounted() {
        var element = document.querySelector("#newsletter"),
            screenHeight = window.innerHeight,
            documentHeight = document.body.clientHeight;

        if (element.offsetTop + 100 > screenHeight) {
            window.addEventListener("scroll", function () {
                if (
                    window.scrollY + 2 * (screenHeight / 3) >=
                        element.offsetTop ||
                    window.scrollY + screenHeight + 50 == documentHeight
                ) {
                    element.dataset.state = "showing";
                }
            });
        } else {
            element.dataset.state = "showing";
        }
    },
};
</script>

<style lang="scss" scoped>
[data-state="showing"] {
    .top,
    .bottom {
        animation: opacitySimple 400ms ease 100ms 1 normal both;
    }
}
#viking{
    display: none;
}
#newsletter {
    background-color: $black;
    color: $white;

    padding: 2.2vw 4vw 2vw 4vw;

    .top {
        opacity: 0;
        h3 {
            @include Titulo2_S();
            font-size: 4vw;
        }
        p {
            @include Fonte1_SS;
            font-size: 1.4vw;
            width: 45vw;
            text-align: justify;
        }
        h6 {
            @include Fonte2_S;
            font-size: 1.1vw;
            margin-top: 1.1vw;
            color: $yellow;
        }
    }
    .bottom {
        opacity: 0;
        margin-top: 2vw;

        form {
            [type="email"] {
                border-radius: 0.3vw;
                @include Fonte2_SS;
                font-size: 1.4vw;
                color: $black;

                width: 25vw;
                border: none;

                &:focus {
                    box-shadow: 0 0 0 0;
                    outline: none;
                    border: none;
                }
            }
            [type="submit"] {
                @include Titulo2_S;
                font-size: 1.6vw;

                padding: 0.5vw 1.3vw 0.5vw 1.3vw;
                border-radius: 0.2vw;

                margin-left: 2.4vw;

                @include buttonT($yellow, $white, $black, $black);
            }
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
    #newsletter {
        padding: 3vw 0 3vw 0;
        flex-grow: 1;

        display: flex;
        flex-direction: column;
        align-items: center;

        .top {
            h3 {
                font-size: 4vw;
            }
            p {
                font-size: 1.8vw;
                width: 55vw;
            }
            h6 {
                font-size: 1.4vw;
                margin-top: 1.4vw;
                color: $yellow;
            }
        }
        .bottom {
            margin-top: 3vw;

            form {
                [type="email"] {
                    border-radius: 0.4vw;
                    font-size: 1.6vw;

                    width: 40vw;
                    border: none;
                    padding: 0.5vw 1.5vw 0.5vw 1.5vw;
                }
                [type="submit"] {
                    font-size: 2vw;

                    padding: 0.6vw 1.5vw 0.6vw 1.5vw;
                    border-radius: 0.4vw;
                }
            }
        }
    }
}
@media (max-width: 700px) {
    #newsletter{
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    #viking{
        display: block;
        width: 60vw;
        margin-top: 3vw;
    }
    #subscription {
        padding: 4vw 0 4vw 0;

        .top {
            h3 {
                font-size: 5vw;
            }
            p {
                font-size: 2.2vw;
                width: 70vw;
            }
            h6 {
                font-size: 1.8vw;
                margin-top: 1.8vw;
            }
        }
        .bottom {
            margin-top: 4vw;

            form {
                [type="email"] {
                    border-radius: 0.6vw;
                    font-size: 2.4vw;

                    width: 55vw;
                    padding: 0.7vw 2.5vw 0.7vw 2.5vw;
                }
                [type="submit"] {
                    font-size: 3vw;

                    padding: 0.7vw 2.5vw 0.7vw 2.5vw;
                    border-radius: 0.8vw;
                }
            }
        }
    }
}
@media (max-width: 500px) {
    #subscription {
        padding: 6vw 0 6vw 0;

        .top {
            h3 {
                font-size: 6vw;
            }
            p {
                font-size: 3.2vw;
                width: 80vw;
            }
            h6 {
                font-size: 3vw;
                margin-top: 2.2vw;
            }
        }
        .bottom {
            margin-top: 5.5vw;

            form {
                [type="email"] {
                    border-radius: 0.9vw;
                    font-size: 3.5vw;

                    width: 60vw;
                    padding: 0.7vw 2.5vw 0.7vw 2.5vw;
                }
                [type="submit"] {
                    font-size: 4vw;

                    padding: 0.7vw 2.5vw 0.7vw 2.5vw;
                    border-radius: 0.9vw;
                }
            }
        }
    }
}
</style>
