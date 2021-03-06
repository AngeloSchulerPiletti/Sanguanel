<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title> Informações Básicas </template>

        <template #description>
            Atualize informações como e-mail e foto.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div
                class="photo"
                v-if="$page.props.jetstream.managesProfilePhotos"
            >
                <!-- Profile Photo File Input -->
                <input
                    type="file"
                    class="hidden"
                    ref="photo"
                    @change="updatePhotoPreview"
                />

                <!-- <jet-label for="photo" value="Photo" /> -->

                <!-- Current Profile Photo -->
                <div class="current" v-show="!photoPreview">
                    <img
                        class="pic"
                        :src="user.profile_photo_url"
                        :alt="user.name"
                    />
                </div>

                <!-- New Profile Photo Preview -->
                <div class="new" v-show="photoPreview">
                    <span
                        class="pic"
                        :style="
                            'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                            photoPreview +
                            '\');'
                        "
                    >
                    </span>
                </div>

                <div class="actions_container">
                    <button class="btn2" @click.prevent="selectNewPhoto">
                        Trocar de Foto
                    </button>
                    <button
                        class="btn2"
                        @click.prevent="deletePhoto"
                        v-if="user.profile_photo_path"
                    >
                        Remover Foto
                    </button>
                </div>

                <!-- <jet-input-error :message="form.errors.photo" /> -->
            </div>

            <div class="sequential_input">
                <!-- Name -->
                <div class="input name">
                    <jet-label for="name" value="Nome" />
                    <jet-input
                        id="name"
                        type="text"
                        v-model="form.name"
                        autocomplete="name"
                    />
                    <!-- <jet-input-error :message="form.errors.name" /> -->
                </div>

                <!-- Email -->
                <div class="input email">
                    <jet-label for="email" value="Email" />
                    <jet-input id="email" type="email" v-model="form.email" />
                    <!-- <jet-input-error :message="form.errors.email" /> -->
                </div>
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Salvo
            </jet-action-message>
            <button class="btn" :disabled="form.processing">Salvar</button>
        </template>
    </jet-form-section>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";

export default {
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
    },

    props: ["user", "errors"],

    data() {
        return {
            form: this.$inertia.form({
                _method: "PUT",
                name: this.user.name,
                email: this.user.email,
                photo: null,
            }),

            photoPreview: null,
        };
    },

    methods: {
        updateProfileInformation() {
            if (this.$refs.photo) {
                this.form.photo = this.$refs.photo.files[0];
            }

            this.form.post(route("user-profile-information.update"), {
                //errorBag: "updateProfileInformation",
                preserveScroll: true,
                onSuccess: () => this.clearPhotoFileInput(),
            });
        },

        selectNewPhoto() {
            this.$refs.photo.click();
        },

        updatePhotoPreview() {
            const photo = this.$refs.photo.files[0];

            if (!photo) return;

            const reader = new FileReader();

            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };

            reader.readAsDataURL(photo);
        },

        deletePhoto() {
            this.$inertia.delete(route("current-user-photo.destroy"), {
                preserveScroll: true,
                onSuccess: () => {
                    this.photoPreview = null;
                    this.clearPhotoFileInput();
                },
            });
        },

        clearPhotoFileInput() {
            if (this.$refs.photo?.value) {
                this.$refs.photo.value = null;
            }
        },
    },
};
</script>

<style lang="scss" scoped>
@import "resources/css/sass/admin/Components/profile";

@include profileShowStyle;


 /*+-----------------------------------------------------+
  |                RESPONSIVIDADE                                  |
  +-----------------------------------------------------+*/
@media (max-width: 1300px) {
    //
}
@media (max-width: 1100px) {
@include profileShowStyle2;
}
</style>
