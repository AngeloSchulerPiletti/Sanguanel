<template>
  <navegation>
        <ul>
            <li v-for="(key, dir) in sessionViews" :key="dir">
                <inertia-link :href="route(key)"><p>{{key}}</p></inertia-link>
            </li>
        </ul>
  </navegation>
</template>

<script>
export default {
    data(){
        return{
            sessionViews:[
                "login",
                "cadastro",
                "admin",
                "início",
            ]
        }
    }
}
</script>

<style>

</style>