<template>
    <!-- Drop Menu -->
    <div class="r_button">
        <arrow id="arrow_btn" :color="colorArrow" data-btnstate="none" @click="arrowCall()" />
    </div>
    <div id="r_drop" :class="wichDrop" data-dropstate="none">
        <ul>
            <li>
                <hr/>
            </li>

            <li v-for="(link, index) in links" :key="index">
                <inertia-link class="drop_links" :href="link">{{index}}</inertia-link>
                <hr/>
            </li>

            <li v-if="$page.props.user && $page.props.user.adminLevel > 2 && wichDrop == 'public'">
                <inertia-link class="drop_links" href="/admin">Administrador</inertia-link>
                <hr/>
            </li>
            <li v-if="$page.props.user">
                <form @submit.prevent="logout()">
                    <button class="drop_links" as="button" type="submit">
                        Sair
                    </button>
                </form>
                <hr />
            </li>
        </ul>
    </div>
</template>

<script>
import Arrow from "@/Pages/admin/Components/Icons/Arrow";

export default {
    data(){
        return{
            colorArrow: "$black",
            wichDrop: "admin",
        }
    },
    props:{
        links: Object,
        type: String,
    },
    methods: {
        arrowCall: function () {
            var btn = document.querySelector('#arrow_btn'),
                dropbox = document.querySelector("#r_drop");

            if (
                btn.dataset.btnstate == "close" ||
                btn.dataset.btnstate == "none"
            ) {
                dropbox.style.display = "block";
                btn.dataset.btnstate = "open";
                dropbox.dataset.dropstate = "show";
            } else {
                btn.dataset.btnstate = "close";
                dropbox.dataset.dropstate = "hide";

                setTimeout(function () {
                    dropbox.style.display = "none";
                }, 400);
            }
        },
        logout() {
            this.$inertia.post(route("logout"));
        },
    },
    created(){
        if(this.type == "public"){
            this.wichDrop = this.type;
            this.colorArrow = "$white";
        }
    },
    components:{
        Arrow,
    }
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/admin/Components/animations";

.r_button {
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    [data-btnstate] {
        transform: rotate(90deg);
        width: 2vw;

        transition-duration: 200ms;
        transition-property: transform;

        &:hover {
            cursor: pointer;
        }
    }
    [data-btnstate="open"] {
        transform: scaleY(-1) rotate(90deg);
    }
    [data-btnstate="close"] {
        transform: scaleY(1) rotate(90deg);
    }
}
.public{
    top: calc(100% + 1vw);
    right: -15px;
    background-color: $black;
}
.admin{
    background-color: $tinyback;
}
[data-dropstate] {
    position: absolute;

    border-radius: 0 0 0.7vw 0.7vw;
    padding: 0.5vw 0 0.5vw 0;

    width: 14vw;

    li {
        
        font-size: 1.4vw;
        width: 100%;

        display: flex;
        flex-direction: column;

        .drop_links {
            padding: 0.6vw 1.2vw 0.6vw 1.2vw;
            
            @include Fonte2_SS();

            transition-duration: 200ms;
            transition-property: border;

            &:hover {
                border-left: 3px solid $yellow;
            }
            &:focus {
                outline: none;
                box-shadow: 0 0 0 0;
                border-left: 3px solid $yellow;
            }
        }
        hr {
            border: none;
            outline: none;

            height: 1px;
            background-color: $white;

            margin: 0.5vw 0 0.5vw 0;
        }
    }
}
[data-dropstate="none"] {
    display: none;
}
[data-dropstate="show"] {
    animation: showDropbox 150ms ease 0ms 1 normal both;
}
[data-dropstate="hide"] {
    animation: hideDropbox 400ms ease 0ms 1 normal both;
}
</style>
