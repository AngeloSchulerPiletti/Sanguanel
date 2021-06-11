<template>
    <inertia-head>
        <title>Administrador | Sanguanel</title>
    </inertia-head>

    <app-admin :atPage="'admin'">
      <section id="privileges_container" v-if="$page.props.user.adminLevel >= 3">
        <div class="top">
          <h3>Privilégios de Administrador</h3>
          <p>{{$page.props.user.name}}, atualmente seus privilégios de administrador são:</p>
        </div>
        <div class="bottom">
          <ul>
            <li v-if="$page.props.user.adminLevel > 3">Criar publicações</li>
            <li v-if="$page.props.user.adminLevel > 3">Gerenciar o banco de dados do website</li>
            <li v-if="$page.props.user.adminLevel > 3">Enviar uma newletter</li>
            <li v-if="$page.props.user.adminLevel > 3">Alterar Páginas do website</li>
            <li v-if="$page.props.user.adminLevel > 2">Enviar artigos para serem aprovados</li>
            <li v-if="$page.props.user.adminLevel > 2">Ver base de dados</li>
          </ul>
        </div>
      </section>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";

export default {
    components: {
        AppAdmin,
    },
};
</script>

<style lang="scss">
#privileges_container{
  display: flex;
  flex-direction: column;
  gap: 3vw;
  padding: 5vw;

  .top{
    h3{
      @include Titulo1_S;
      font-size: 3.5vw;
    }
    p{
      @include Fonte1_S;
      font-size: 1.6vw;
    }
  }
  .bottom{
    ul{
      display: flex;
      flex-direction: column;
      gap: 0.4vw;
      li{
        @include Fonte1_S;
        font-size: 1.45vw;
        border-left: 2px solid $yellow;
        padding-left: 1vw;
        margin-left: 6vw;
      }
    }
  }
}
</style>
