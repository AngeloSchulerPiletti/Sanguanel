<template>
  <header>
      <h1>{{articleData[0]}}</h1>
      <h6>{{articleData[1]}}</h6>
  </header>
</template>

<script>
export default {
    props:{
        articleData: Array,
    },
}
</script>

<style lang="scss" scoped>
@import "resources/css/sass/Components/mixins.scss";

@include headerArticle();
</style>