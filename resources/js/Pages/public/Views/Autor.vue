<template>
    <app-public :header_content="header">
        <section id="author_container">
            <section id="sec_1">
                <div class="top">
                    <img
                        id="profile"
                        :src="data.profile"
                        alt="Foto de Perfil"
                    />
                    <p id="bio">{{ data.bio }}</p>
                </div>
                <div class="bottom">
                    <div>
                        <linkedin/>
                        <a href="www.linkedin.com/in/angelo-schuler-piletti">LINKEDIN</a>
                    </div>
                    <div>
                        <github/>
                        <a href="https://github.com/AngeloSchulerPiletti">GITHUB</a>
                    </div>
                </div>
            </section>
            <section id="sec_2" class="paragraph">
                <h4>{{ data.title1 }}</h4>
                <div>
                    <p>{{ data.text1 }}</p>
                    <img v-if="data.picture1" :src="data.picture1" alt="" />
                </div>
            </section>
            <section id="sec_3" class="paragraph">
                <h4>{{ data.title2 }}</h4>
                <div>
                    <p>{{ data.text2 }}</p>
                    <!-- <img v-if="data.picture2" :src="data.picture2" alt="" /> -->
                </div>
            </section>
        </section>
    </app-public>
</template>

<script>
import AppPublic from "@/Layouts/AppPublic";
import Github from "@/Pages/public/Components/Icons/Github";
import Linkedin from "@/Pages/public/Components/Icons/Linkedin";

export default {
    data() {
        return {
            header: {
                title: ["Pazer, sou o", "Angelo", ""],
                style: "HomePages",
            },
        };
    },
    components: {
        AppPublic,
        Github,
        Linkedin,
    },
    props: {
        data: Object,
    },
    mounted() {
        console.log("mounted");
        console.log(this.data);
    },
};
</script>

<style lang="scss" scoped>
#author_container {
  padding: 4vw;

    
    #sec_1 {
        display: flex;
        flex-direction: column;

        margin-bottom: 2vw;

        .top {
            display: flex;

            #profile {
                width: 15vw;
                border-radius: 50%;
            }
            #bio {
              @include Fonte2_S;
            }
        }
        .bottom {
            display: flex;
        }
    }

    .paragraph{
      margin: 4vw 0 0 0;
      h4{
        @include Titulo2_S;
        text-transform: uppercase;
        font-size: 2.4vw;  
      }
      div{
        display: flex;

        p{
          @include Fonte2_SS;
          font-size: 1.4vw;
        }
        img{
          width: 30vw;
        }
      }
    }
}
</style>
