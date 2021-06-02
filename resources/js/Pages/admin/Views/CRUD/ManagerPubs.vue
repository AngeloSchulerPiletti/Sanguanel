<template>
    <app-admin :atPage="'admin'" :atManager="'pubs'">
        <section id="man_pubs">
            <instructions :data="instructions" />

            <section class="top">
                <h1>Criador de Publicação</h1>
                <div  @click="setInstruction(0)">Ver Instruções</div>
            </section>
            <section class="bottom">
                <form>
                    <!-- DADOS -->
                    <div class="input_container">
                        <label for="author"><span>Autor</span><span @click="setInstruction(1)"><info/></span></label>
                        <input type="text" id="author" />
                    </div>
                    <div class="input_container">
                        <label for="title"><span>Título</span><span @click="setInstruction(2)"><info/></span></label>
                        <input type="text" id="title" />
                    </div>

                    <!-- ASSUNTO -->
                    <div class="input_container">
                        <label for="subject"><span>Assunto</span><span @click="setInstruction(3)"><info/></span></label>
                        <select name="subject" id="subject">
                            <option value="0">Artigos: História</option>
                            <option value="1">Artigos: Produção</option>
                            <option value="2">Artigos: Curiosidades</option>
                            <option value="3">Receitas: Comidas</option>
                            <option value="4">Receitas: Drinks</option>
                        </select>
                    </div>

                    <!-- TEXTO -->
                    <div class="input_container">
                        <label for="text"
                            ><span>Artigo</span><span @click="setInstruction(4)"><info/></span
                        ></label>
                        <textarea id="text"></textarea>
                    </div>

                    <!-- IMAGENS -->
                    <div class="input_container">
                        <div id="imgs_actions">
                            <div @click="Imgs(1)">ADD IMG</div>
                            <div @click="Imgs(0)">REM IMG</div>
                            <span @click="setInstruction(5)"><info/></span>
                        </div>
                        <div id="imgs_container">
                            <div
                                v-for="img in imgs"
                                :key="img"
                                class="img_container"
                            >
                                <label :for="'images_' + img"
                                    ><span>Imagens</span></label
                                >
                                <input type="file" :id="'images_' + img" />
                            </div>
                        </div>
                    </div>

                    <!-- AÇÕES -->
                    <div id="actions">
                        <button>CRIAR</button>
                        <button>CANCELAR</button>
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
            imgs: 0,
            instructions: ['pubs', undefined],
        };
    },
    methods: {
        Imgs: function (action) {
            this.imgs;

            if (action == 1) {
                this.imgs++;
            } else if (action == 0) {
                if (this.imgs > 0) {
                    this.imgs--;
                }
            }
        },
        setInstruction: function (wich){
          this.instructions[1] = wich;
        },
    },
    components: {
        AppAdmin,
        Instructions,
        Info,
    },
};
</script>

<style lang="scss" scoped>
#man_pubs {
    .top {
    }
    .bottom {
    }
}
</style>
