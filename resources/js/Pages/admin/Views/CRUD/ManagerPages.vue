<template>
    <inertia-head>
        <title>Alterar Páginas | Administrador</title>
    </inertia-head>

    <app-admin :atPage="'admin'" atSubpage="pages">
        <!-- POP_UPs -->
        <instructions
            @closeMe="setInstruction"
            :data="instructions"
            :DBdata="DBdata"
        />

        <main id="man_pages">
            <section id="intro_sec">
                <h3>Alteração de Páginas do Website</h3>
                <p>Função destinada apenas para altos Administradores.</p>
            </section>
            <section id="cards_sec">
                <div v-for="(content, page) in pages" :key="page">
                    <change-card
                        :page="page"
                        @callChanges="changePopUp(page, content)"
                    ></change-card>
                </div>
            </section>
        </main>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";
import ChangeCard from "@/Pages/admin/Components/CRUD/ChangeCard";
import Instructions from "@/Pages/admin/Components/CRUD/Instructions";

export default {
    data() {
        return {
            instructions: [undefined, undefined],
            DBdata: {},
        };
    },
    created() {
        //
    },
    methods: {
        setInstruction: function (wich) {
            console.log(wich);
            this.instructions = wich;
        },
        changePopUp: function (page, content) {
            if (this.$page.props.user.adminLevel > 3) {
                console.log('turning into '+page);
                this.instructions[1] = page;
                this.instructions[0] = "pageschange";
                this.DBdata = content;
            }
        },
        
    },
    props: {
        pages: Array,
    },
    components: {
        AppAdmin,
        ChangeCard,
        Instructions,
    },
};
</script>

<style lang="scss" scoped>
#man_pages {
    display: flex;
    flex-direction: column;
    gap: 10vw;
    margin-bottom: 10vw;

    #intro_sec {
        margin-top: 6vw;
        text-align: center;

        h3 {
            @include Titulo2_S;
            font-size: 3.5vw;
        }
        p {
            @include Fonte1_SS;
            font-size: 1.3vw;
        }
    }
    #cards_sec {
        display: flex;
        flex-direction: column;
        gap: 5vw;
    }
}
</style>
