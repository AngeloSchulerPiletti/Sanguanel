<template>
    <div id="changes_forms">
        <!-- TABELA USUARIOS -->
        <form
            v-if="table == 'users' && $page.props.user.adminLevel > 3"
            @submit.prevent="submit(form_users)"
        >
            <label for="name"
                >Nome<input type="text" id="name" v-model="form_users.name"
            /></label>
            <label for="email"
                >Email<input type="email" id="email" v-model="form_users.email"
            /></label>
            <label for="team"
                >Team<input type="number" id="team" v-model="form_users.team"
            /></label>
            <label for="picture"
                >Foto de Perfil<input
                    type="text"
                    id="picture"
                    v-model="form_users.picture"
            /></label>
            <label for="adminLevel"
                >Nível de Administrador<select
                    id="adminLevel"
                    v-model="form_users.adminLevel"
                >
                    <option value="0">Usuário</option>
                    <option value="1">Admin 1</option>
                    <option value="2">Admin 2</option>
                    <option value="3">Sócio</option>
                    <option value="4">Gerente</option>
                </select></label
            >
            <div id="modifier_actions">
                <label for="del"><input type="radio" v-model="form_users.action" value="delete" name="action" id="del">Deletar</label>
                <label for="cha"><input type="radio" v-model="form_users.action" value="change" name="action" id="cha">Alterar</label>
            </div>

            
            <div id="modifier_confirmation">
                <button>Enviar</button>
            </div>
        </form>

        <!-- TABELA ARTIGOS -->
        <form
            v-if="table == 'articles'"
            @submit.prevent="submit(form_articles)"
        >
            <label for="author"
                >Autor<input
                    type="text"
                    id="author"
                    v-model="form_articles.author"
            /></label>
            <label for="description"
                >Descrição<textarea
                    id="description"
                    v-model="form_articles.description"
                ></textarea>
            </label>
            <label for="title"
                >Título<input
                    type="text"
                    id="title"
                    v-model="form_articles.title"
            /></label>
            <label for="text"
                >Texto<textarea
                    id="text"
                    v-model="form_articles.text"
                ></textarea>
            </label>
            <label for="path_dirPictures" v-if="$page.props.user.adminLevel > 3"
                >Caminho para o diretório com as imagens<input
                    type="text"
                    id="path_dirPictures"
                    v-model="form_articles.path_dirPictures"
            /></label>
            <label for="url"
                >URL do artigo<input
                    type="text"
                    id="url"
                    v-model="form_articles.url"
            /></label>
            <label for="keywords"
                >Palavras_Chave<input
                    type="text"
                    id="keywords"
                    v-model="form_articles.keywords"
            /></label>
            <label for="subject"
                >Assunto do artigo<select
                    id="subject"
                    v-model="form_articles.subject"
                >
                    <option value="artigos/historia">Artigos: História</option>
                    <option value="artigos/producao">Artigos: Produção</option>
                    <option value="artigos/curiosidades">
                        Artigos: Curiosidades
                    </option>
                    <option value="receitas/comidas">Receitas: Comidas</option>
                    <option value="receitas/drinks">Receitas: Drinks</option>
                </select></label
            >
            <div id="modifier_actions">
                <label for="del"><input type="radio" v-model="form_articles.action" value="delete" name="action" id="del">Deletar</label>
                <label for="cha"><input type="radio" v-model="form_articles.action" value="change" name="action" id="cha">Alterar</label>
            </div>


            <div id="modifier_confirmation">
                <button>Enviar</button>
            </div>
        </form>

    </div>
</template>

<script>
import Button from '../../../../Jetstream/Button.vue';
export default {
  components: { Button },
    data() {
        return {
            table: "",
            form_users: this.$inertia.form({
                id: undefined,
                name: undefined,
                email: undefined,
                team: undefined,
                picture: undefined,
                adminLevel: undefined,
                table: "users",
                action: "",
            }),
            form_articles: this.$inertia.form({
                id: undefined,
                author: undefined,
                description: undefined,
                title: undefined,
                text: undefined,
                keywords: undefined,
                path_dirPictures: undefined,
                url: undefined,
                subject: undefined,
                table: "articles",
                action: "",
            }),
        };
    },
    props: {
        data: Array,
    },
    created() {
        var db = this.data;
        this.table = db[1];

        if (db[1] == "users") {
            this.form_users.id = db[2]
            this.form_users.name = db[3];
            this.form_users.email = db[4];
            this.form_users.team = db[6];
            this.form_users.picture = db[7];
            this.form_users.adminLevel = db[10];
        } else if (db[1] == "articles") {
            this.form_articles.id = db[2]
            this.form_articles.author = db[5];
            this.form_articles.subject = db[6];
            this.form_articles.description = db[7];
            this.form_articles.title = db[8];
            this.form_articles.text = db[9];
            this.form_articles.keywords = db[10]
            this.form_articles.path_dirPictures = db[11];
            this.form_articles.url = db[13];
        }
        // else if (db[1] == "author") {
        //     this.form_author.id = db[2]
        //     this.form_author.profile = db[5];
        //     this.form_author.bio = db[6];
        //     this.form_author.title1 = db[7];
        //     this.form_author.text1 = db[8];
        //     this.form_author.picture1 = db[9];
        //     this.form_author.title2 = db[10];
        //     this.form_author.text2 = db[11];
        //     this.form_author.picture2 = db[12];
        // }
    },
    methods: {
        submit(form) {
            form.post(this.route("admin.Pdatabase"), {
                onFinish: () =>
                    this.$emit("close"),
            });
        },
    },
};
</script>

<style lang="scss" scoped>
#changes_forms {
    overflow-y: auto;
    height: 50vh;
    form {
        display: flex;
        flex-direction: column;
        gap: 2vw;

        label {
            @include Fonte2_SS;
            font-size: 1.4vw;
        }

        textarea,
        input,
        select {
            @include Fonte2_SS;
            font-size: 1.2vw;

            display: block;
            width: 100%;

            &:focus {
                outline: none;
                box-shadow: 0 0 0 0;
                border: 1px solid $yellow;
            }
        }
        textarea {
            resize: none;
            overflow-y: auto;
        }
        #text{
            height: 50vh;
        }
        #description{
            height: 20vh;
        }
        input {
        }
        input[type="text"] {
        }
        input[type="email"] {
        }
        input[type="number"] {
        }
        select {
            option {
            }
        }
        #modifier_actions{
            label{
                display: flex;
                align-items: center;
                
            }
            [type="radio"]{
                width: 1.2vw;
                height: 1.2vw;
                margin-right: 1vw;

                &:active, &:checked{
                    background-color: $yellow;
                }
            }
        }
        #modifier_confirmation{
            display: flex;
            justify-content: space-around;

            button {
            @include buttonT($black, $yellow, $white, $black);
            @include Fonte1_SS;
            font-size: 1.5vw;
            border-radius: 0.3vw;
            width: fit-content;
            margin: auto;
            padding: 0.6vw 1.4vw 0.6vw 1.4vw;
            margin-bottom: 2vw;
        }
        }
        
    }
}
</style>
