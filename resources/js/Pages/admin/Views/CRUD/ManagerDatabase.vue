<template>
    <app-admin :atPage="'admin'" :atManager="'database'" :message="messages">
        <main id="man_db">
            <!-- GENERATES A TABLES -->
            <section id="all_tables">
                <section
                    v-for="(table, index) in info"
                    :key="index"
                    :id="index"
                    class="table"
                >
                    <table>
                        <tr class="table_header">
                            <th v-for="(value, key) in table[0]" :key="key">
                                {{ key }}
                            </th>
                        </tr>
                        <tr
                            class="table_body"
                            v-for="(row, index) in table"
                            :key="index"
                        >
                            <th v-for="(value, key) in row" :key="key">
                                {{ value }}
                            </th>
                        </tr>
                    </table>
                </section>
            </section>
            <h1>TESTEEEEE</h1>
        </main>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";
import addingmsg from "./functions/addingmsg";

export default {
    data() {
        return {
            info: {
                users: false,
                articles: false,
                author: false,
            },
            messages: {},
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
    },
};
</script>

<style lang="scss">
#man_db {
    

    #all_tables {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 8vw;
        
        overflow-x: scroll;

        width: 80vw;
        margin: 6vw auto 6vw auto;

        background-color: $gray2;

        .table {
            table {
                tr {
                    th {
                    }
                }
                .table_body {
                    th {
                    }
                }
                .table_body {
                    th {
                    }
                }
            }
        }
    }
}
</style>
