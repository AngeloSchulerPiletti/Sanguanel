<template>
    <header v-if="atPage == 'admin' || atPage == 'dashboard'">
        <ul v-if="atPage == 'admin' && adm > 2">
            <li v-for="(infos, name) in Options[adm]" :key="name" :id="infos[1] + '_manager'">
                <inertia-link :href="infos[0]" >{{
                    name
                }}</inertia-link>
            </li>
        </ul>

        <ul v-if="atPage == 'dashboard' && adm <= 2">
            <li></li>
        </ul>
    </header>
</template>

<script>
export default {
    data() {
        return {
            adm: "",
            Options: {
                0: {},
                1: {},
                2: {},
                3: {},
                4: {
                    "Base de Dados": [route("admin.database"), "database"],
                    "Criar Publicação": [route("admin.newpub"), "pubs"],
                    "Alterar Páginas": [route("admin.updatepages"), "pages"],
                    "Gerenciar Admins": [route("admin.manage"), "admins"],
                },
            },
        };
    },
    props: {
        atPage: String,
        atManager: String,
    },
    created() {
        this.adm = this.$page.props.user["adminLevel"];
    },
    mounted() {
        var actual = document.querySelector("#" + this.atManager + "_manager");

        if (actual != null) {
            console.log(actual);
            actual.classList.add("actual");
        }
    },
};
</script>

<style lang="scss" scoped>
header {
    background-color: darken($white, 10%);
    color: $black;

    @include Fonte1_SS();
    font-size: 1.2vw;
    text-transform: uppercase;

    height: 6vw;

    ul {
        display: flex;
        justify-content: center;

        height: 100%;

        li {
            display: flex;
            align-items: flex-end;

            height: 100%;

            @include menuSelection(transparent);

            &:hover {
                background-color: $gray1;
                color: $yellow;
            }

            a {
                padding: 1.5vw 2.5vw 1.5vw 2.5vw;
            }
        }

        .actual {
            @include menuSelection($yellow);
        }
    }
}
</style>
