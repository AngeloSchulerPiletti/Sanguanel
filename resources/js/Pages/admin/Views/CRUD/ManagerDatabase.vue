<template>
    <inertia-head>
        <title>Base de Dados | Administrador</title>
    </inertia-head>
    
    <app-admin :atPage="'admin'" atSubpage="database" :message="messages">
        <main id="man_db">
            <!-- POP_UPs -->
            <instructions
                :data="instructions"
                :DBdata="DBdata"
            />

            <!-- CABEÇALHO -->
            <section class="top container">
                <h1>Gerenciador de Base de Dados</h1>
                <div @click="setInstruction(0)">Ver Instruções</div>
            </section>

            <!-- GENERATES THE TABLES -->
            <section class="center container">
                <section
                    v-for="(table, index) in info"
                    :key="index"
                    :id="index"
                    class="table_container"
                >
                    <h2 v-if="table[0]">{{ titles[index] }}</h2>
                    <table @click="changeData($event, 0)">
                        <!-- Definição das colunas -->

                        <!-- Tabela em si -->
                        <thead>
                            <tr class="table_header">
                                <th v-for="(value, key) in table[0]" :key="key">
                                    {{ key }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="table_body"
                                v-for="(row, index) in table"
                                :key="index"
                            >
                                <td v-for="(value, key) in row" :key="key">
                                    {{ value }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
            <!-- <section class="bottom container">
                //
            </section> -->
        </main>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";
import addingmsg from "./functions/addingmsg";
import Instructions from "@/Pages/admin/Components/CRUD/Instructions";
import Info from "@/Pages/admin/Components/Icons/Info";
import ModifierDb from "@/Pages/admin/Components/CRUD/ModifierDB";

export default {
    data() {
        return {
            titles: {
                users: "Usuários",
                articles: "Artigos",
            },
            info: {
                users: false,
                articles: false,
            },
            messages: {},
            instructions: [undefined, undefined],
            DBdata: {},
        };
    },
    props: {
        database: Object,
        status: Object,
    },
    created() {
        this.Refresh();
    },
    updated() {
        this.Refresh();
    },
    components: {
        AppAdmin,
        Instructions,
        Info,
        ModifierDb,
    },
    methods: {
        setInstruction: function (wich) {
            this.instructions[1] = wich;
            this.instructions[0] = "db";
        },
        changeData: function (event, wich) {
            if (this.$page.props.user.adminLevel > 3) {
                if (event.path[2].tagName == "TBODY") {
                    var elements = event.path[1].querySelectorAll("td"),
                        wichTable = event.path[4].id,
                        contents = ["dbchange", wichTable];

                    elements.forEach((el) => {
                        contents.push(el.textContent);
                    });
                    this.DBdata = contents;
                    this.instructions[1] = wich;
                    this.instructions[0] = "dbchange";
                }
            }
        },
        Refresh: function () {
            console.log(this.$page.props);
            if (this.status) {
                this.messages = this.status;
            }
            if (this.database) {
                if (this.database.users && this.database.articles) {
                    this.info.users = this.database.users;
                    this.info.articles = this.database.articles;
                } else {
                    this.messages = addingmsg.addMsg(this.messages, [
                        "Alguns ou todos os dados não foram recebeidos!",
                    ]);
                }
            } else {
                console.log("no db");
            }
        },
    },
};
</script>

<style lang="scss">
#man_db {
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

    .center {
        // WRAPPER
        background-color: $gray3;
        border-top: 3px solid $yellow;
        padding: 2vw;

        display: flex;
        flex-direction: column;
        gap: 6vw;

        .table_container {
            max-height: 70vh;
            overflow-y: auto;

            h2 {
                @include Titulo2_S;
                text-transform: uppercase;
                font-size: 2vw;
            }

            table {
                color: $white;
                border: 2px solid $yellow;

                thead {
                    background-color: $gray2;

                    tr {
                        th {
                            padding: 1.4vw;
                            font-size: 1.4vw;
                            @include Fonte1_SS;
                        }
                    }
                }
                tbody {
                    background-color: $gray1;
                    tr {
                        td {
                            padding: 1.4vw;
                            font-size: 1.2vw;
                            @include Fonte2_SS;

                            border-bottom: 1px solid $tinyback;
                        }
                    }
                }
            }
        }

        // #users {

        // }
        // #articles {
        //     table {
        //         // width: 100%;
        //         // table-layout: fixed;

        //     }
        // }
        // #author {
        // }
    }

    .bottom {
        background-color: $gray3;
        border-bottom: 3px solid $yellow;

        padding: 2vw;
    }
}
</style>
