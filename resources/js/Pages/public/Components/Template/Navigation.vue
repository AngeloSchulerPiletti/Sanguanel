<template>
    <nav
        data-state="none"
        @mouseleave="
            hidePageList();
            searchHide();
        "
    >
        <ul id="menu_container">
            <inertia-link href="/"
                ><Logo id="Logo"
            /></inertia-link>
            <hr />

            <li v-for="(Obj, pageCode, i) in paths" :key="i">
                <!-- DESKTOP -->
                <inertia-link
                    v-if="i >= 0 && !menuMobile"
                    :href="Object.values(Obj)[0]"
                    @mouseover="showSubPageList(pageCode)"
                >
                    <Icon1 class="menu_icon" v-if="i == 0" />
                    <Icon2 class="menu_icon" v-if="i == 1" />
                    <Icon3 class="menu_icon" v-if="i == 2" />
                    <Icon4 class="menu_icon" v-if="i == 3" />
                </inertia-link>

                <!-- MOBILE -->
                <div
                    v-else-if="i >= 0 && menuMobile"
                    @click="showSubPageList(pageCode)"
                >
                    <Icon1 class="menu_icon" v-if="i == 0" />
                    <Icon2 class="menu_icon" v-if="i == 1" />
                    <Icon3 class="menu_icon" v-if="i == 2" />
                    <Icon4 class="menu_icon" v-if="i == 3" />
                </div>
            </li>
        </ul>

        <ul
            id="sub_dirs"
            v-show="page_hover"
            :data-list="page_hover"
            data-side="hide"
        >
            <li
                class="sub_pages"
                v-for="(route, sub, index) in paths[page_hover]"
                :key="index"
            >
                <hr v-show="index > 0" />

                <inertia-link
                    :href="route"
                >
                    <span>{{ Object.keys(paths[page_hover])[index] }}</span>
                </inertia-link>
            </li>
        </ul>

        <form @submit.prevent>
            <!-- DESKTOP -->
            <inertia-link
                v-if="!menuMobile"
                id="search_link"
                :href="route('search.show', { keywords: (field ? field : '') })"
                @mouseover="searchShow()"
                ><IconSearch class="menu_icon"
            /></inertia-link>
            <!-- MOBILE -->
            <div
                v-else-if="!clicked"
                @click="searchShow()"
                id="search_link"
                :href="route('search.show', { keywords: (field ? field : '') })"
                ><IconSearch class="menu_icon"
            /></div>
            <inertia-link
                v-else-if="clicked"
                id="search_link"
                :href="route('search.show', { keywords: (field ? field : '') })"
                @click="searchShow()"
                ><IconSearch class="menu_icon"
            /></inertia-link>

            <input
                id="search_field"
                data-side="none"
                type="text"
                placeholder="Busque aqui"
                v-model="field"
                autocomplete="off"
            />
        </form>


        <!-- BOTÃO DO MENU -->
        <div id="nav_btn_container">
            <div id="pull_nav_btn">
                <arrow
                    id="pull_btn"
                    color="$white"
                    data-btnstate="none"
                    @click="menuCall()"
                />
            </div>
        </div>
    </nav>
</template>

<script>
import LogoBranco from "../Icons/LogoBranco";
import Icon1 from "../Icons/Icon1";
import Icon2 from "../Icons/Icon2";
import Icon3 from "../Icons/Icon3";
import Icon4 from "../Icons/Icon4";
import IconSearch from "../Icons/IconSearch";
import Arrow from "../../../admin/Components/Icons/Arrow.vue";

export default {
    data() {
        return {
            clicked: false,
            menuMobile: false,
            field: null,
            colorIcon: "#FFFFFF",
            page_hover: "",
            paths: {
                artigos: {
                    Início: route("artigos.", { section: "", id: "" }),
                    História: route("artigos.", {
                        section: "historia",
                        id: "",
                    }),
                    Produção: route("artigos.", {
                        section: "producao",
                        id: "",
                    }),
                    Curiosidades: route("artigos.", {
                        section: "curiosidades",
                        id: "",
                    }),
                },
                receitas: {
                    Início: route("receitas.", { section: "", id: "" }),
                    Comida: route("receitas.", { section: "comidas", id: "" }),
                    Drinks: route("receitas.", { section: "drinks", id: "" }),
                },
                institucional: {
                    Início: route("institucional.", { section: ""}),
                    Exposição: route("institucional.", {
                        section: "exposicao",
                    }),
                    Política: route("institucional.", {
                        section: "politica",
                    }),
                },
                autor: { Autor: route("autor") },
            },
        };
    },
    created() {
        var screen = window.innerWidth;
        if (screen <= 700) {
            this.menuMobile = true;
        }
    },
    methods: {
        menuCall: function () {
            var btn = document.querySelector("#pull_btn"),
                menu = document.querySelector("nav");

            if (
                btn.dataset.btnstate == "close" ||
                btn.dataset.btnstate == "none"
            ) {
                this.$emit("toBlock", "yes");
                btn.dataset.btnstate = "open";
                menu.dataset.state = "show";
            } else {
                this.$emit("toBlock", "no");
                btn.dataset.btnstate = "close";
                menu.dataset.state = "hide";
            }
        },
        showSubPageList: function (x) {
            // console.log(x);
            this.page_hover = x;
            var el = document.getElementById("sub_dirs");
            el.style.display = "block";
            el.dataset.side = "show";
        },
        hidePageList: function () {
            var el = document.getElementById("sub_dirs");
            el.dataset.side = "hide";

            setTimeout(function () {
                this.page_hover = "";
                el.style.display = "none";
            }, 300);
        },

        searchShow: function () {
            this.clicked = true;
            var el = document.getElementById("search_field");
            el.dataset.side = "show";
            el.style.display = "block";
        },
        searchHide: function () {
            this.clicked = false;
            var el = document.getElementById("search_field");
            if (el.dataset.side != "none") {
                el.dataset.side = "hide";
                setTimeout(() => {
                    el.style.display = "none";
                }, 300);
            }
        },
    },
    components: {
        Logo: LogoBranco,
        Icon1,
        Icon2,
        Icon3,
        Icon4,
        IconSearch,
        Arrow,
    },
};
</script>

<style lang="scss" scoped>
nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: column;
    position: fixed;
    z-index: 1000000;

    transform-style: preserve-3d;

    width: $menuWidth;
    // height: 100vh;
    min-height: -webkit-fill-available;

    background-color: $black;
    // @include Titulo1_S();

    #menu_container {
        display: flex;
        align-items: center;
        flex-direction: column;
        #Logo {
            width: 60px;
            margin-top: 16px;
            margin-bottom: 20px;
        }
        hr {
            outline: none;
            border: none;
            height: 1px;
            width: 90%;
            background-color: white;

            margin-bottom: 30px;
        }
        li {
            // @include SVGHold($white, $yellow);
            color: $white;
        }
    }
    .menu_icon {
        width: 40px;
        margin-bottom: 16px;
    }
    form {
        #search_link {
            // margin-bottom: 20px;
            &:hover {
                outline: none;
            }
        }
        #search_field {
            position: fixed;
            left: $menuWidth;
            width: 420px;
            height: 60px;
            bottom: 15px;

            @include Fonte3_SS();
            font-size: 1.5vw;

            background-color: $black;
            color: $white;
            border: 1px solid $white;
            border-left: 5px solid $yellow;
            border-radius: 0 6px 6px 0;
            outline: none;

            &:focus {
                box-shadow: 0 0 0 0;
                outline: 0;
            }

            &::placeholder {
                color: $white;
            }
        }
    }

    #nav_btn_container {
        display: none;
    }
}

#sub_dirs {
    position: fixed;

    left: $menuWidth;
    transform: translate(-100%, 0);

    width: 140px;
    background-color: $black;

    border-top: 1px solid $white;
    border-bottom: 1px solid $white;

    li {
        @include Fonte1_SS();
        text-transform: capitalize;
        color: $white;
        border-left: 2px solid transparent;
        transition-duration: 200ms;
        transition-property: border-left;

        &:hover {
            border-left: 5px solid $yellow;
        }

        hr {
            background-color: $white;
            border: none;
            outline: 0;
            height: 1px;
        }
        span {
            display: block;
            font-size: 16px;
            padding: 8px 12px 8px 12px;
        }
    }
}

[data-list="artigos"] {
    top: 100px;
}
[data-list="receitas"] {
    top: 180px;
}
[data-list="institucional"] {
    top: 240px;
}
[data-list="autor"] {
    top: 300px;
}

/*+---------------------------------------------+
  |                 ANIMAÇÕES                   |
  +---------------------------------------------+*/
[data-side="show"] {
    @include animSideShow();
}
[data-side="hide"] {
    @include animSideHide();
}
[data-side="none"] {
    display: none;
}

/*+-----------------------------------------------------+
  |                RESPONSIVIDADE                       |
  +-----------------------------------------------------+*/
@media (max-width: 1300px) {
    //
}
@media (max-width: 1100px) {
    nav {
        width: $menuWidth2;

        #menu_container {
            #Logo {
                width: 48px;
                margin-top: 12px;
                margin-bottom: 16px;
            }
            hr {
                margin-bottom: 20px;
            }
        }
        .menu_icon {
            width: 35px;
            margin-bottom: 14px;
        }
        form {
            margin-bottom: 10px;

            #search_field {
                left: $menuWidth2;
                width: 350px;
                height: 40px;
                font-size: 1.8vw;
            }
        }
    }

    #sub_dirs {
        left: $menuWidth2;
        width: 115px;

        li {
            span {
                font-size: 15px;
                padding: 8px 12px 8px 12px;
            }
        }
    }
    [data-list="artigos"] {
        top: 94px;
    }
    [data-list="receitas"] {
        top: 140px;
    }
    [data-list="institucional"] {
        top: 190px;
    }
    [data-list="autor"] {
        top: 240px;
    }
}

@media (max-width: 700px) {
    nav {
        &[data-state] {
            transition-property: transform;
            transition-duration: 200ms;
        }
        &[data-state="hide"] {
            transform: translateX(-100%);
        }
        &[data-state="show"] {
            transform: translateX(0);
        }
        width: $menuWidth2;
        transform: translateX(-100%);

        #menu_container {
            #Logo {
                width: 48px;
                margin-top: 12px;
                margin-bottom: 16px;
            }
            hr {
                margin-bottom: 20px;
            }
        }
        .menu_icon {
            width: 35px;
            margin-bottom: 14px;
        }
        form {
            margin-bottom: 10px;

            #search_field {
                height: 55px;
                font-size: 16px;
                width: 60vw;
            }
        }
        #nav_btn_container {
            display: block;

            background-color: $black;
            padding: 1vw 0.5vw 1vw 0.5vw;
            border-radius: 0 1vw 1vw 0;
            border-left: 2px solid $white;

            position: absolute;
            top: 60%;
            right: 0px;
            transform: translateX(100%);

            #pull_nav_btn {
                width: 5.5vw;
                height: 5.5vw;

                [data-btnstate] {
                    transition-duration: 200ms;
                    transition-property: transform;

                    &:hover {
                        cursor: pointer;
                    }
                }
                [data-btnstate="open"] {
                    transform: scaleX(-1);
                }
                [data-btnstate="close"] {
                    transform: scaleX(1);
                }
            }
        }
    }
}

@media (max-width: 500px) {
    nav {
        #menu_container {
            #Logo {
                width: 48px;
                margin-top: 12px;
                margin-bottom: 16px;
            }
            hr {
                margin-bottom: 20px;
            }
        }
        .menu_icon {
            width: 35px;
            margin-bottom: 14px;
        }
        form {
            margin-bottom: 10px;

            #search_field {
                height: 55px;
                font-size: 16px;
            }
        }
        #nav_btn_container {
            display: block;

            background-color: $black;
            padding: 1.5vw 0.5vw 1.5vw 0.5vw;
            border-radius: 0 1vw 1vw 0;
            border-left: 2px solid $white;

            position: absolute;
            top: 60%;
            right: 0px;
            transform: translateX(100%);

            #pull_nav_btn {
                width: 7.2vw;
                height: 7.8vw;

                [data-btnstate] {
                    transition-duration: 200ms;
                    transition-property: transform;

                    &:hover {
                        cursor: pointer;
                    }
                }
                [data-btnstate="open"] {
                    transform: scaleX(-1);
                }
                [data-btnstate="close"] {
                    transform: scaleX(1);
                }
            }
        }
    }
}
</style>
