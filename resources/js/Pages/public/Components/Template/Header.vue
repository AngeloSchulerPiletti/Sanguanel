<template>
    <header
    >
        <!-- Tipos de Cabeçalho para cada tipo página -->
        <h1 v-if="header.style == 'HomePages'" :class="'title_' + header.style">
            {{ header.title[0] }}<br />
            <h1>{{ header.title[1] }}</h1>
            {{ header.title[2] }}
        </h1>
        <h1
            v-if="header.style == 'SubHomePages'"
            :class="'title_' + header.style"
        >
            {{ header.title[0] }}<br />
            <h1>{{ header.title[1] }}</h1>
        </h1>
        <h1 v-if="header.style == 'Contents'" :class="'title_' + header.style">
            {{ header.title[0] }}
        </h1>

        <ul id="user_menus_container">
            <li class="user_menus" v-if="!$page.props.user">
                <inertia-link href="/register"> Registrar </inertia-link>
            </li>
            <li class="user_menus" v-if="$page.props.user">
                <inertia-link href="/dashboard"> Conta </inertia-link>
            </li>
            <li class="user_menus">
                <inertia-link href="/login">
                    Login
                    <IconLock id="login_icon" />
                </inertia-link>
            </li>
        </ul>
    </header>
</template>

<script>
import IconLock from "../../Components/svg/home_page/IconLock";
export default {
    data() {
        return {
            header: {
                style: this.header_content.style,
                title: this.header_content.title,
            },
        };
    },
    props: {
        header_content: Object,
    },
    components: {
        IconLock,
    },
    methods: {
        //
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/public/Components/mixins.scss";

header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;

    padding: 1.6vw 1.6vw 1vw 2.5vw;
    background-color: $black;
    color: $white;

    @include headerStyle();

    #user_menus_container {
        display: flex;
        flex-direction: row;
        align-items: flex-end;

        .user_menus {
            margin: 0 0.5vw 0 0.5vw;

            a {
                @include Fonte2_SS;
                font-size: 1.2vw;

                transition-duration: 300ms;
                transition-property: color;

                &:hover {
                    color: $yellow;
                }
                #login_icon {
                    display: inline-block;
                    transform: translateY(25%);
                }
            }
        }
    }
}
</style>
