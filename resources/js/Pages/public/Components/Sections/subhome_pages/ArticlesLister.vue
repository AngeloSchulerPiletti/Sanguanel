<template>
  <section id="list">
      <ul>
          <li v-for="(article, index) in articles_list" :key="index">
              <inertia-link :href="article.url">
                    <div>
                        <h2>{{article.title}}</h2>
                        <p>{{article.description}}</p>
                    </div>
              </inertia-link>
              
          </li>
      </ul>
  </section>
</template>

<script>
export default {
props:{
    articles_list: Object,
}
}
</script>

<style lang="scss" scoped>

</style>