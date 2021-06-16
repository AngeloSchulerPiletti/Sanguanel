<template>
  <div id="sharebtn_container">
      <div id="share" class="share_icon" @click="btn">
          <share :state="button.state"/>
      </div>
      <div id="links">
        <link-icon class="icon"/>
        <whatsapp class="icon"/>
        <linkedin class="icon"/>
        <facebook class="icon"/>
      </div>
      
  </div>
</template>

<script>
import Share    from '@/Layouts/Components/Templates/icons/Share.vue'
import Whatsapp from '@/Layouts/Components/Templates/icons/Whatsapp.vue';
import Linkedin from '@/Layouts/Components/Templates/icons/Linkedin.vue';
import Facebook from '@/Layouts/Components/Templates/icons/Facebook.vue';
import LinkIcon from './Templates/icons/LinkIcon.vue';

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
    Whatsapp,
    Linkedin,
    Facebook,
    LinkIcon,
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
  .icon{
    width: 4vw;
    height: 4vw;
  }
}
</style>