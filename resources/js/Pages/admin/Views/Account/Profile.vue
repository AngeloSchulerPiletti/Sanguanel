<template>
    <app-admin :atPage="'account'" atSubpage="profile">
        <main>
            <section id="basic_infos">
                <div class="container_left">
                    <div class="top">
                        <div class="left">
                            <img
                                :src="user.profile_photo_url"
                                :alt="user.name"
                            />
                        </div>
                        <div class="right">
                            <label for="name"
                                >Nome:
                                <span>{{ user.name }}</span>
                            </label>
                            <label for="email"
                                >Email: <span>{{ user.email }}</span></label
                            >
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="info">
                            Você está cadastrado desde:
                            <span>{{ register_date }}</span>
                        </div>
                        <div class="info">
                            Seu nível de Administrador é:
                            <span>{{ user.adminLevel }}</span>
                        </div>

                        <div id="actions">
                            <inertia-link :href="route('account.profile.show')"
                                >Editar</inertia-link
                            >
                        </div>
                    </div>
                </div>
                <div class="container_right">
                    <h3>Perfil</h3>
                    <p>É realmente um prazer ter você em nosso site {{user.name}}!</p>
                </div>
            </section>
        </main>
    </app-admin>
</template>

<script>
import AppAdmin from "@/Layouts/AppAdmin";

export default {
    components: {
        AppAdmin,
    },
    props: ["user", "register_date"],
};
</script>

<style lang="scss" scoped>
#basic_infos {
    display: flex;
    padding: 5vw;
    gap: 3vw;

    .container_left {
        width: 50vw;

        .top {
            background-color: $tinyback;
            border-radius: 0.8vw 0.8vw 0 0;
            padding: 3.5vw 3.5vw 2vw 3.5vw;
            display: flex;
            gap: 3vw;

            .left {
                img {
                    object-fit: cover;
                    border-radius: 100%;
                    border: 1px solid $black;
                    width: 14vw;
                    height: 14vw;
                }
            }
            .right {
                display: flex;
                flex-direction: column;
                padding-top: 1vw;
                gap: 1vw;

                label {
                    @include Fonte1_SS;
                    font-size: 1.5vw;
                    color: $black;

                    span {
                        @include Fonte2_SS;
                        font-size: 1.7vw;
                    }
                }
            }
        }
        .bottom {
            padding: 2vw 3.5vw 3.5vw 3.5vw;
            background-color: $white;
            border-radius: 0 0 0.8vw 0.8vw;

            .info {
                @include Fonte1_SS;
                color: $black;
                font-size: 1.6vw;

                span {
                    @include Fonte2_SS;
                    font-size: 1.8vw;
                }
            }
            #actions {
                margin: 1.4vw 0 0 0;
                position: relative;

                a {
                    @include anchorA($black, $yellow);
                    position: absolute;
                    right: 0;
                    @include Fonte2_SS;
                    font-size: 1.1vw;
                }
            }
        }
        
    }
    .container_right {
        color: $white;
        
        h3{
            @include Titulo2_S;
            font-size: 3vw;
            margin-bottom: 0.5vw;
        }
        p{
            @include Fonte1_SS;
            font-size: 1.3vw;
        }
    }
}
</style>
