<template>
  <div id="sharebtn_container">
      <div id="share" class="share_icon" @click="btn">
          <share :state="button.state"/>
      </div>
      
  </div>
</template>

<script>
import Share from './Templates/icons/Share.vue'

export default {
  data(){
    return{
      button:{
        state: 'none',
      }
    }
  },
  methods:{
    btn: function(){
      var state = this.button.state; 
      this.button.state = state == 'none' || state == 'hide' ? 'show' : 'hide';
    }
      
    
  },
  components:{
    Share,
  }
}
</script>

<style lang="scss" scoped>
#sharebtn_container{
  position: fixed;
  right: 2vw;
  bottom: 2vw;

  z-index: 100;

  #share{
    background-color: $black;
    padding: 0.8vw;
    border-radius: 100%;
  }
  .share_icon{
    height: 5vw;
    width: 5vw;
    cursor: pointer;
  }
}
</style>