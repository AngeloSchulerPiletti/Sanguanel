<template>
    <inertia-head>
        <title>Publicação | Administrador</title>
    </inertia-head>

    <app-admin :atPage="'admin'" atSubpage="pubs" :message="status">
        <section id="man_pubs">
            <instructions
                :data="instructions"
            />

            <section class="top container">
                <h1>Criador de Publicação</h1>
                <div @click="setInstruction(0)">Ver Instruções</div>
            </section>
            <section class="bottom container">
                <form @submit.prevent="submit">
                    <!-- DADOS -->
                    <div class="input_container">
                        <label for="author"
                            ><span @click="setInstruction(1)"><info /></span
                            ><span>Autor</span></label
                        >
                        <input class="field" v-model="form.author" type="text" id="author" />
                    </div>
                    <div class="input_container">
                        <label for="title"
                            ><span @click="setInstruction(2)"><info /></span
                            ><span>Título</span></label
                        >
                        <input class="field" v-model="form.title" type="text" id="title" />
                    </div>

                    <!-- ASSUNTO -->
                    <div class="input_container">
                        <label for="subject"
                            ><span @click="setInstruction(3)"><info /></span
                            ><span>Assunto</span></label
                        >
                        <select class="field" v-model="form.subject" name="subject" id="subject">
                            <option value="artigos/historia">Artigos: História</option>
                            <option value="artigos/producao">Artigos: Produção</option>
                            <option value="artigos/curiosidades">Artigos: Curiosidades</option>
                            <option value="receitas/comidas">Receitas: Comidas</option>
                            <option value="receitas/drinks">Receitas: Drinks</option>
                        </select>
                    </div>

                    <!-- DESCRIÇÃO  -->
                    <div class="input_container">
                        <label for="description"
                            ><span @click="setInstruction(6)"><info /></span
                            ><span>Descrição</span></label
                        >
                        <textarea class="field" v-model="form.description" id="description"></textarea>
                    </div>

                    <!-- TEXTO -->
                    <div class="input_container">
                        <label for="text"
                            ><span @click="setInstruction(4)"><info /></span
                            ><span>Artigo</span></label
                        >
                        <textarea class="field" v-model="form.text" id="text"></textarea>
                    </div>

                    <div class="input_container">
                        <label for="keywords"
                            ><span @click="setInstruction(7)"><info /></span
                            ><span>Palavras-Chave</span></label
                        >
                        <input class="field" v-model="form.keywords" type="text" id="keywords" />
                    </div>

                    <!-- IMAGENS -->
                    <div class="input_container">
                        <div id="imgs_actions">
                            <span @click="setInstruction(5)"><info /></span>
                            <div @click="Imgs(1)">ADD IMG</div>
                            <div @click="Imgs(0)">REM IMG</div>
                        </div>
                        <div id="imgs_container">
                            <div
                                v-for="img in imgs"
                                :key="img"
                                class="img_container"
                            >
                                <label :for="'images_' + img"
                                    ><span>Imagens{{img}}</span></label
                                >
                                <input
                                    @input="form.images[img - 1] = $event.target.files[0]"
                                    class="field"
                                    type="file"
                                    :id="'images_' + img"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- AÇÕES -->
                    <div id="actions">
                        <button>CANCELAR</button><button>CRIAR</button>
                    </div>
                </form>
            </section>
        </section>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";
import Instructions from "@/Pages/admin/Components/CRUD/Instructions";
import Info from "@/Pages/admin/Components/Icons/Info";

export default {
    data() {
        return {
            imgs: 1,
            instructions: ["pubs", undefined],
            form:  this.$inertia.form({
              author: this.$page.props.user.name,
              title: null,
              subject: null,
              description: null,
              text: null,
              keywords: null,
              images: [],
            }),
        };
    },
    methods: {
        submit: function () {
            this.form.post(this.route("admin.createRequire"), {
                onFinish: () => {
                    // this.form.images = [];
                    // this.imgs = 0;
                } 
            });
        },
        Imgs: function (action) {
            if (action == 1) {
                this.imgs++;
            } else if (action == 0) {
                if (this.imgs > 0) {
                    this.imgs--;
                }
            }
        },
        setInstruction: function (wich) {
            this.instructions[1] = wich;
        },
    },
    components: {
        AppAdmin,
        Instructions,
        Info,
    },
    props:{
      status: Object,
    }
};
</script>

<style lang="scss" scoped>
#man_pubs {
    color: $black;

    .container {
        width: 80vw;
        margin: auto;
        margin-bottom: 2vw;
        border-radius: 0.3vw;
    }
    .top {
        background-color: $yellow;
        border-left: 20px solid $gray3;

        margin-top: 6vw;
        padding: 1.8vw;

        h1 {
            @include Titulo2_S;
            text-transform: uppercase;
            font-size: 3vw;
        }
        div {
            @include Fonte1_SS;
            font-size: 1.3vw;
            cursor: pointer;

            @include anchorT($black, $white);
        }
    }

    .bottom {
        background-color: $gray3;
        border-top: 3px solid $yellow;

        padding: 2vw;

        form {
            .input_container {
                margin-bottom: 4vw;

                label {
                    display: flex;
                    align-items: center;

                    @include Fonte1_SS;
                    font-size: 1.4vw;

                    span {
                        margin-right: 0.6vw;
                    }
                }

                .field {
                    border-radius: 0.2vw;

                    @include Fonte2_SS;
                    font-size: 1.3vw;

                    &:focus {
                        outline: none;
                        box-shadow: 0 0 0 0;
                        border: 2px solid $yellow;
                    }
                }
                input {
                    width: 100%;
                }
                textarea{
                    resize: none;
                    width: 100%;
                }
                #text {
                    height: 70vh;
                }
                #description{
                    height: 15vh;
                }

                #imgs_actions {
                    display: flex;
                    align-items: center;

                    span {
                        margin-right: 1.5vw;
                    }
                    div {
                        margin-right: 1vw;
                        @include buttonT($yellow, $black, $white, $white);

                        @include Fonte1_SS;
                        font-size: 1.4vw;

                        padding: 0.2vw 1vw 0.2vw 1vw;
                        border-radius: 0.25vw;
                        cursor: pointer;
                    }
                }
                #imgs_container {
                    margin-top: 2vw;

                    .img_container {
                        margin-bottom: 2vw;
                        width: fit-content;
                    }
                }
            }
            #actions {
                display: flex;
                justify-content: space-between;

                width: 100%;

                button {
                    @include buttonT($black, $yellow, $white, $white);
                    @include Fonte1_SS;
                    font-size: 1.8vw;

                    padding: 0.2vw 1vw 0.2vw 1vw;
                    border-radius: 0.25vw;
                }
            }
        }
    }
}
</style>
