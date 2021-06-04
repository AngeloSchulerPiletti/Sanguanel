<template>
    <app-admin :atPage="'admin'" :atManager="'database'" :message="messages">
        <main id="man_db">
            <instructions
                @meDelete="setInstruction(undefined)"
                :data="instructions"
            />

            <section class="top container">
                <h1>Gerenciador de Base de Dados</h1>
                <div @click="setInstruction(0)">Ver Instruções</div>
            </section>

            <!-- GENERATES A TABLES -->
            <section class="center container">
                <section
                    v-for="(table, index) in info"
                    :key="index"
                    :id="index"
                    class="table_container"
                >
                    <table>
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
                                <th v-for="(value, key) in row" :key="key">
                                    {{ value }}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
            <section class="bottom container">
                <h1>BOTTOM HERE</h1>
            </section>
        </main>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";
import addingmsg from "./functions/addingmsg";
import Instructions from "@/Pages/admin/Components/CRUD/Instructions";
import Info from "@/Pages/admin/Components/Icons/Info";

export default {
    data() {
        return {
            info: {
                users: false,
                articles: false,
                author: false,
            },
            messages: {},
            instructions: ["db", undefined],
        };
    },
    props: {
        database: Object,
        status: Object,
    },
    created() {
        if (this.status) {
            this.messages = this.status;
        }
        if (
            this.database.users &&
            this.database.articles &&
            this.database.author
        ) {
            this.info.users = this.database.users;
            this.info.articles = this.database.articles;
            this.info.author = this.database.author;
        } else {
            this.messages = addingmsg.addMsg(this.messages, [
                "Alguns ou todos os dados não foram recebeidos!",
            ]);
        }
    },
    components: {
        AppAdmin,
        Instructions,
        Info,
    },
    methods: {
        setInstruction: function (wich) {
            this.instructions[1] = wich;
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
            overflow-x: scroll;
            border: 2px solid $yellow;

            table {
                color: $white;
                thead {
                    background-color: $gray2;

                    tr {
                        th {
                            padding: 1.4vw;
                            @include Fonte1_SS;
                            font-size: 1.4vw;
                        }
                    }
                }
                tbody {
                    background-color: $gray1;
                    tr {
                        th {
                            padding: 1vw;
                            @include Fonte2_SS;
                            font-size: 1.2vw;

                            border-bottom: 1px solid $tinyback;
                        }
                    }
                }
            }
        }
    }

    .bottom {
        background-color: $gray3;
        border-bottom: 3px solid $yellow;

        padding: 2vw;
    }
}
</style>
