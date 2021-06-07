<template>
    <header v-if="atPage == 'admin' || atPage == 'account'">

        <ul v-if="atPage == 'admin' && adm > 2">
            <li v-for="(infos, name) in adminOptions[adm]" :key="name" :id="infos[1] + '_subpage'">
                <inertia-link :href="infos[0]" >{{
                    name
                }}</inertia-link>
            </li>
        </ul>

        <ul v-if="atPage == 'account'">
            <li v-for="(infos, name) in publicOptions"     :key="name" :id="infos[1] + '_subpage'">
                <inertia-link :href="infos[0]">{{
                    name    
                }}</inertia-link>
            </li>
        </ul>
    </header>
</template>

<script>
export default {
    data() {
        return {
            adm: "",
            adminOptions: {
                0: {},
                1: {},
                2: {},
                3: {
                    "Criar Publicação":  [route("admin.newpub"), "pubs"],
                },
                4: {
                    "Base de Dados":     [route("admin.database"), "database"],
                    "Criar Publicação":  [route("admin.newpub"), "pubs"],
                    "Alterar Páginas":   [route("admin.updatepages"), "pages"],
                    "Criar Newsletter":  [route("admin.news"), "news"],
                },
            },
            publicOptions: {
                "Perfil":     [route("account.profile"), "profile"],
            },
        };
    },
    props: {
        atPage: String,
        atSubpage: String,
    },
    created() {
        this.adm = this.$page.props.user["adminLevel"];
    },
    mounted() {
        var actual = document.querySelector("#" + this.atSubpage + "_subpage");

        if (actual != null) {
            actual.classList.add("actual");
        }
    },
};
</script>

<style lang="scss" scoped>
header {
    background-color: $gray3;
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
