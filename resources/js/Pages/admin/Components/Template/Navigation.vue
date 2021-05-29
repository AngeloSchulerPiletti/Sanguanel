<template>
  <nav>
      <div class="left">
          <logo-preto id="logo"/>
      </div>
      <div class="right">
          <ul>
              <li :class="li.register"><inertia-link href="/register">Registrar</inertia-link></li>
              <li :class="li.login"><inertia-link href="/login">Entrar</inertia-link></li>
              <li :class="li.dashboard"><inertia-link href="/dashboard">Administrador</inertia-link></li>
          </ul>
      </div>
  </nav>
</template>

<script>
import LogoPreto from "@/Pages/admin/Components/Icons/LogoPreto";

export default {
    data(){
        return{
            li:{
                login: "",
                register: "",
                dashboard: "",
            }
        }
    },
    components:{
        LogoPreto,
    },
    props:{
        atPage: String,
    },
    mounted(){
        this.li[this.atPage] = 'actual';
    },
}
</script>

<style lang="scss" scoped>
nav{
    display: flex;
    width: 100%;

    .left{
        

        #logo{
            margin: 1vw 2.5vw 1vw 2.5vw;
            width: 6vw;
        }
    }
    .right{
        @include Fonte1_SS();
        text-transform: uppercase;

        flex-grow: 1;

        ul{
            display: flex;
            justify-content: center;

            height: 100%;
            
            li{
                display: flex;
                align-items: flex-end;

                padding: 1.5vw;
                height: 100%;

                &:hover{
                    background-color: $gray1;
                    color: $yellow;
                }
            }

            .actual{
                border-bottom: 1px solid $yellow;
            }
        }
    }
}
</style>