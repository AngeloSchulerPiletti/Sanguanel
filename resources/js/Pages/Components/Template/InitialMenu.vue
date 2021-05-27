<template >
    <nav @mouseleave="hidePageList(); searchHide();">
        
        <ul id="menu_container">
            <inertia-link :href="urlSelector()"><Logo id="Logo"/></inertia-link>
            <hr>

            <li v-for="(pages, page, i) in paths['/']" :key="i">
                
                <inertia-link v-if="i > 0" :href="urlSelector(i + 1)" @mouseover="showPageList(page, i)">
                    <Icon1 class="menu_icon" v-if="i == 1"/>
                    <Icon2 class="menu_icon" v-if="i == 2"/>
                    <Icon3 class="menu_icon" v-if="i == 3"/>
                    <Icon4 class="menu_icon" v-if="i == 4"/>
                </inertia-link>
            </li>
        </ul>

        <ul id="sub_dirs" v-show="page_hover" :data-list="page_hover" data-side="hide">
            <li class="sub_pages" v-for="(sub, index) in paths['/'][page_hover]" :key="index" >
                <hr v-show="index > 0">
                
                <inertia-link :href="urlSelector(keyPos(paths['/'], page_hover), index + 1)"> 
                    <p>{{paths['/'][page_hover][index]}}</p> 
                </inertia-link>
            </li>
        </ul>
        
        <form>
            <button type="submit" @mouseover="searchShow()" ><IconSearch class="menu_icon"/></button>
            <input id="search_field" data-side="none" type="text" placeholder="Busque aqui"/>
        </form>
    </nav>
</template>

<script>
import LogoBranco from "../Icons/LogoBranco";
import Icon1 from "../Icons/Icon1";
import Icon2 from "../Icons/Icon2";
import Icon3 from "../Icons/Icon3";
import Icon4 from "../Icons/Icon4";
import IconSearch from "../Icons/IconSearch";

export default {
    data() {
        return {
            colorIcon: "#FFFFFF",
            page_hover: "",
            paths:{

                "/" : {
                    "inicio" : [

                    ],
                    "artigos" : [
                                    "historia",
                                    "producao",
                                    "curiosidades", 
                    ],
                    "receitas" : [
                                    "comidas",
                                    "drinks",
                    ],
                    "institucional" : [
                                    "exposicao",
                                    "politica",
                    ],
                    "autor" : [],
                },

            },
        };
    },
    props:{
    },
    components: {
        Logo: LogoBranco,
        Icon1,
        Icon2,
        Icon3,
        Icon4,
        IconSearch,
    },
    methods:{
        urlSelector: function(page = null, subpage = null){ //page e subpage são numeros
            const vm = this;
            const dir = vm.paths["/"]
            var linksURL = [];
            var links = [];
            var view = "";
            page--;
            subpage--;
            
            for(var key in dir){
                view = "/" + key + "/";
                linksURL.push(view);
                links.push(key);
            }

            if(page >= 0 && subpage >= 0){
                var subdir = dir[links[page]];
                return linksURL[page] + subdir[subpage];
            }
            else if(page >= 0 && subpage < 0){
                return linksURL[page];
            }
            else{
                return "/";
            }
            
        },
        keyPos: function(obj, keyP){
            var position = 1;
            for(var key in obj){
                if(obj[key] == obj[keyP]){
                    return position;
                }
                position++;
            }
        },


        showPageList: function(x, i){
            var noSubpages = {0: "inicio", 4: "autor"};
            if(noSubpages[i] == x){
                this.page_hover = "";
            }else{
                this.page_hover = x;
                var el = document.getElementById("sub_dirs");
                el.style.display = "block";
                el.dataset.side = "show";
                
            }
        },
        hidePageList: function(){
            var el = document.getElementById("sub_dirs");
            el.dataset.side = "hide";
            
            setTimeout(function(){
                this.page_hover = "";
                el.style.display = "none";
            },  300)
            
        },

        searchShow: function(){
            var el = document.getElementById("search_field");
            el.dataset.side = "show";
            el.style.display = "block";
        },
        searchHide: function(){
            var el = document.getElementById("search_field");
            if(el.dataset.side != "none"){
                el.dataset.side = "hide";
                setTimeout(()=>{
                    el.style.display = "none";
                }, 300)
                
            };
                
        },
    },
}
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
    height: 100vh;

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
        hr{
            outline: none;
            border: none;
            height: 1px;
            width: 90%;
            background-color: white;

            margin-bottom: 30px;
        }
        li {
            // @include SVGHold();
            color: $white;

            
            
            
        }
        
    }
    .menu_icon {
        width: 40px;
        margin-bottom: 16px;
    }
    form {
        button{
            margin-bottom: 10px;
            &:hover{
            outline: none;
            }
        }
        #search_field{
            position: fixed;
            left: $menuWidth;
            width: 420px;
            height: 60px;
            bottom: 15px;
            
            @include Fonte3_SS();
            

            background-color: $black;
            color: $white;
            border: none;
            border-radius: 0 6px 6px 0;
            outline: none;
            
            &:focus{
                box-shadow: 0 0 0 0;
                outline: 0;
            }

            &::placeholder{
                color: $white;
            }
        }
        // @include SVGHold();
    }
    
}



#sub_dirs{
    position: fixed;

    // top: 100px;
    left: $menuWidth;
    transform: translate(-100%, 0);
    
    
    width: 140px;
    background-color: $gray1;
    padding: 15px 0 15px 0;

    li{
        @include Fonte1_SS();
        text-transform: capitalize;
        color: $white;
        

        hr{
            margin: 8px 0 8px 0;
        }
        p{
            font-size: 15px;
            margin: 0 12px 0 12px;
        }
        
    }
    
}

[data-side="show"]{
    @include animSideShow();
}
[data-side="hide"]{
    @include animSideHide();
}
[data-side="none"]{
    display: none;
}


[data-list="artigos"]{
    top: 100px
}
[data-list="receitas"]{
    top: 180px
}
[data-list="institucional"]{
    top: 240px
}
[data-list="autor"]{
    top: 300px
}
</style>