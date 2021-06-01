<template>
    <section id="newsletter">
        <div class="top">
            <h3>NEWSLETTER</h3>
            <p>
                Ao assinar nossa newsletter gratuita você receberá informações
                relevantes por e-mail assim como promoções de hidromeis que
                acharmos interessantes! 
            </p>
            
            <h6>Regularidade: Até 1x por semana;</h6>
            
        </div>
        <div class="bottom">
            <form @submit.prevent="submit">
                <input v-model="cadastro.email" placeholder="Email" type="email" name="email" />
                <button type="submit">Enviar</button>
            </form>
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
};
</script>

<style lang="scss" scoped>
#newsletter{
    background-color: $black;
    color: $white;

    padding: 2.2vw 4vw 2vw 4vw;


    .top{
        h3{
            @include Titulo2_S();
            font-size: 4vw;
        }
        p{
            @include Fonte1_SS;
            font-size: 1.4vw;
            width: 45vw;
            text-align: justify;
        }
        h6{
            @include Fonte2_S;
            font-size: 1.1vw;
            margin-top: 1.1vw;
            color: $yellow;
        }
    }
    .bottom{
        margin-top: 2vw;

        form{
            [type="email"]{
                border-radius: 0.3vw;
                @include Fonte2_SS;
                font-size: 1.4vw;
                color: $black;

                width: 25vw;
                border: none;

                &:focus{
                    box-shadow: 0 0 0 0;
                    outline: none;
                    border: none
                }
            }
            [type="submit"]{
                @include Titulo2_S;
                font-size: 1.6vw;

                padding: 0.5vw 1.3vw 0.5vw 1.3vw;
                border-radius: 0.2vw;

                margin-left: 2.4vw;

                @include buttonT($yellow, $white, $black, $black)
            }
        }
    }
}
</style>
