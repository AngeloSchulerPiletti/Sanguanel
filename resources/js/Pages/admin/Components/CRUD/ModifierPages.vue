<template>
    <section id="changes_form">
        <!-- para INSTITUCIONAL -->
        <form
            v-if="wich == 'institucional'"
            @submit.prevent="submit('institucional')"
        >
            <!-- DESCRIÇÃO -->
            <div class="input_container">
                <label for="description">Descrição</label
                ><textarea
                    id="description"
                    class="field"
                    v-model="forms.institucional.description"
                ></textarea>
            </div>

            <!-- TEXTO -->
            <div class="input_container">
                <label for="text"
                    ><span @click="emitInstructions(4)"><info /></span
                    ><span>Artigo</span></label
                >
                <textarea
                    class="field"
                    v-model="forms.institucional.text"
                    id="text"
                ></textarea>
            </div>

            <!-- PÁGINA  -->
            <div class="input_container">
                <label for="subject">Página</label>
                <select
                    class="field"
                    v-model="forms.institucional.subject"
                    name="subject"
                    id="subject"
                    @change="onlyInstitucional"
                >
                    <option value="exposicao">Exposição</option>
                    <option value="politica">Política</option>
                </select>
            </div>

            <!-- IMAGENS -->
            <div class="input_container">
                <div id="imgs_actions">
                    <span @click="emitInstructions(5)"><info /></span>
                    <div @click="Imgs(1)">ADD IMG</div>
                    <div @click="Imgs(0)">REM IMG</div>
                </div>
                <div id="imgs_container">
                    <div v-for="img in imgs" :key="img" class="img_container">
                        <label :for="'images_' + img"
                            ><span>Imagens{{ img }}</span></label
                        >
                        <input
                            @input="
                                forms.institucional.images[img - 1] =
                                    $event.target.files[0]
                            "
                            class="field"
                            type="file"
                            :id="'images_' + img"
                        />
                    </div>
                </div>
            </div>

            <div id="actions">
                <button>Enviar</button>
            </div>
        </form>

        <!-- para SUBHOMEs -->
        <form
            v-else-if="wich == 'subhomes'"
            @submit.prevent="submit('subhomes')"
        >
            <!-- DESCRIÇÃO -->
            <div class="input_container">
                <label for="description">Descrição</label
                ><textarea
                    id="description"
                    class="field"
                    v-model="forms.subhomes.description"
                ></textarea>
            </div>

            <!-- SUBJECT -->
            <div class="input_container">
                <label for="subject">SubHome</label>
                <select
                    class="field"
                    v-model="forms.subhomes.subject"
                    name="subject"
                    id="subject"
                    @change="onlySubhomes"
                >
                    <option value="historia">Artigos: História</option>
                    <option value="producao">Artigos: Produção</option>
                    <option value="curiosidades">Artigos: Curiosidades</option>
                    <option value="comidas">Receitas: Comidas</option>
                    <option value="drinks">Receitas: Drinks</option>
                </select>
            </div>

            <div id="actions">
                <button>Enviar</button>
            </div>
        </form>

        <!-- para AUTHOR  -->
        <form v-else-if="wich == 'author'" @submit.prevent="submit('author')">
            <!-- PROFILE -->
            <div class="input_container">
                <label for="profile">Foto de Perfil</label>
                <input
                    @input="forms.author.profile = $event.target.files[0]"
                    class="field"
                    type="file"
                    id="profile"
                />
            </div>
            <div class="input_container">
                <label for="bio">Bio</label
                ><textarea
                    id="bio"
                    class="field"
                    v-model="forms.author.bio"
                ></textarea>
            </div>

            <!-- SEÇÃO 1 -->
            <div class="input_container">
                <label for="title1">Título 1</label
                ><input
                    type="text"
                    class="field"
                    id="title1"
                    v-model="forms.author.title1"
                />
            </div>
            <div class="input_container">
                <label for="text1">Texto 1</label
                ><textarea
                    id="text1"
                    class="field"
                    v-model="forms.author.text1"
                ></textarea>
            </div>
            <div class="input_container">
                <label for="picture_1">Foto 1</label>
                <input
                    @input="forms.author.picture1 = $event.target.files[0]"
                    class="field"
                    type="file"
                    id="picture_1"
                />
            </div>

            <!-- SEÇÃO 2 -->
            <div class="input_container">
                <label for="title2">Título 2</label
                ><input
                    class="field"
                    type="text"
                    id="title2"
                    v-model="forms.author.title2"
                />
            </div>
            <div class="input_container">
                <label for="text2">Texto 2</label
                ><textarea
                    id="text2"
                    class="field"
                    v-model="forms.author.text2"
                ></textarea>
            </div>
            <div class="input_container">
                <label for="picture_2">Foto 2</label>
                <input
                    @input="forms.author.picture2 = $event.target.files[0]"
                    class="field"
                    type="file"
                    id="picture_2"
                />
            </div>

            <div id="actions">
                <button>Enviar</button>
            </div>
        </form>

        <!-- para HOMES  -->
        <form v-else-if="wich == 'homes'" @submit.prevent="submit('homes')">
            <!-- PÁGINA  -->
            <div class="input_container">
                <label for="subject">Página</label>
                <select
                    class="field"
                    v-model="forms.homes.subject"
                    name="subject"
                    id="subject"
                    @change="onlyHomes"
                >
                    <option value="artigos">Artigos</option>
                    <option value="receitas">Receitas</option>
                    <option value="institucional">Institucional</option>

                </select>
            </div>

            <!-- DESCRIÇÃO -->
            <div class="input_container">
                <label for="description">Descrição</label
                ><textarea
                    id="description"
                    class="field"
                    v-model="forms.homes.description"
                ></textarea>
            </div>

            <!-- TEXTO -->
            <div class="input_container">
                <label for="text"
                    ><span @click="emitInstructions(4)"><info /></span
                    ><span>Conteúdo</span></label
                >
                <textarea
                    class="field"
                    v-model="forms.homes.text"
                    id="text"
                ></textarea>
            </div>

            <!-- IMAGENS -->
            <div class="input_container">
                <div id="imgs_actions">
                    <span @click="emitInstructions(5)"><info /></span>
                    <div @click="Imgs(1)">ADD IMG</div>
                    <div @click="Imgs(0)">REM IMG</div>
                </div>
                <div id="imgs_container">
                    <div v-for="img in imgs" :key="img" class="img_container">
                        <label :for="'images_' + img"
                            ><span>Imagens{{ img }}</span></label
                        >
                        <input
                            @input="
                                forms.homes.images[img - 1] =
                                    $event.target.files[0]
                            "
                            class="field"
                            type="file"
                            :id="'images_' + img"
                        />
                    </div>
                </div>
            </div>

            <div id="actions">
                <button>Enviar</button>
            </div>
        </form>
    </section>
</template>

<script>
import Info from "@/Pages/admin/Components/Icons/Info";

export default {
    data() {
        return {
            imgs: 0,
            forms: {
                institucional: this.$inertia.form({
                    table: "institucional",
                    id: null,
                    subject: null,
                    description: null,
                    text: null,
                    images: [],
                }),
                subhomes: this.$inertia.form({
                    table: "subhomes",
                    id: null,
                    description: null,
                    subject: null,
                }),
                author: this.$inertia.form({
                    table: "author",
                    id: null,
                    bio: null,
                    picture1: null,
                    picture2: null,
                    profile: null,
                    text1: null,
                    text2: null,
                    title1: null,
                    title2: null,
                }),
                homes: this.$inertia.form({
                    table: "homes",
                    id: null,
                    subject: null,
                    description: null,
                    text: null,
                    images: [],
                }),
            },
        };
    },
    methods: {
        // logIt: function (event) {
        //     //
        // },
        onlySubhomes: function () {
            var actual = this.forms.subhomes.subject;
            this.data.forEach((el) => {
                if (el.subject == actual) {
                    this.forms.subhomes.description = el.description;
                    this.forms.subhomes.id = el.id;
                }
            });
        },
        onlyInstitucional: function () {
            var actual = this.forms.institucional.subject;
            this.data.forEach((el) => {
                if (el.subject == actual) {
                    this.forms.institucional.text = el.text;
                    this.forms.institucional.id = el.id;
                }
            });
        },
        onlyHomes: function () {
            var actual = this.forms.homes.subject;
            this.data.forEach((el) => {
                if (el.subject == actual) {
                    this.forms.homes.text = el.text;
                    this.forms.homes.description = el.description;
                    this.forms.homes.id = el.id;
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
        submit: function (form) {
            this.forms[form].post(this.route("admin.Ppages"), {
                onFinish: () => this.$emit("close"),
            });
        },
        emitInstructions: function (wich) {
            this.$emit("instructions", ["pubs", wich]);
        },
    },
    created() {
        var db = this.data;
        // console.log(db);
        if (this.wich == "author") {
            this.forms.author.id = db.id;
            // this.forms.author.profile = db.profile;
            this.forms.author.bio = db.bio;
            this.forms.author.title1 = db.title1;
            this.forms.author.text1 = db.text1;
            // this.forms.author.picture1 = db.picture1;
            this.forms.author.title2 = db.title2;
            this.forms.author.text2 = db.text2;
            // this.forms.author.picture2 = db.picture2;
        } else if (this.wich == "subhomes") {
            this.forms.subhomes.id = db.id;
            this.forms.subhomes.description = db.description;
            this.forms.subhomes.subject = db.subject;
        } else if (this.wich == "institucional") {
            this.forms.institucional.id = db.id;
            this.forms.institucional.subject = db.subject;
            this.forms.institucional.text = db.text;
            this.forms.institucional.description = db.description;
        } else if (this.wich == "homes") {
            // this.forms.homes.id = db.id;
            // this.forms.homes.subject = db.subject;
            // this.forms.homes.text = db.text;
            // this.forms.homes.description = db.description;
        }
    },
    props: {
        data: Array,
        wich: String,
    },
    components: {
        Info,
    },
};
</script>

<style lang="scss" scoped>
#changes_form {
    overflow-y: auto;
    height: 55vh;
    margin-bottom: 1vw;

    form {
        color: $black;

        .input_container {
            margin-bottom: 4vw;

            label {
                display: flex;
                align-items: center;

                @include Fonte2_SS;
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
            textarea {
                resize: none;
                width: 100%;
                height: 20vh;
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
</style>
