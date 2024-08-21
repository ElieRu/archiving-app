<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
import axios from "axios";
import { router, useForm } from "@inertiajs/vue3";

export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
    },
    props: ["user", "errorPassword"],
    data() {
        return {
            form: {
                id: this.user.id,
                name: this.user.name,
                postname: this.user.postname,
                sexe: this.user.sexe,
                matricule: this.user.matricule,
                email: this.user.email,
                poste: this.user.poste,
            },
            formPassword: {
                id: this.user.id,
                current_password: "$Regi094",
                password: "#Elie000",
                confirmation: "#Elie000",
            },
            image: "",
            disable: false,
            err: false,
        };
    },
    methods: {
        submit() {
            this.disable = true;
            this.err = false;
            axios
                .put("/agents-add", this.form)
                .then((res) => {
                    this.disable = false;
                })
                .catch((err) => {
                    this.err = true;
                    this.disable = false;
                });
        },
        updatePassword() {
            this.$inertia.put("/user/password", this.formPassword, {
                onSuccess: () => {
                    // 
                }, preserveScroll: true, preserveState: true,
            })
        },
        onChange(e) {
            this.image = e.target.files[0];
            this.$inertia.post(
                "/upload-image",
                {
                    _method: "put",
                    id: this.user.id,
                    image: this.image,
                },
                {
                    onSuccess: () => {
                        this.$inertia.replace("/profile");
                    },
                }
            );
        },
    },
};
</script>

<template>
    <body id="page-top">
        <div id="wrapper">
            <NavBar :role="user.role" />
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <NavBarTop :user="user" />
                    <div class="container-fluid">
                        <h3 class="text-dark mb-4">Profile</h3>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-body shadow">
                                        <div
                                            class="d-flex justify-content-center"
                                        >
                                            <img
                                                class="rounded-circle mb-3 mt-4"
                                                :src="'/storage' + user.image"
                                                width="160"
                                                height="160"
                                            />
                                        </div>
                                        <div
                                            class="d-flex justify-content-center mb-3"
                                        >
                                            <label
                                                class="form-label"
                                                for="img-profile"
                                                ><a
                                                    class="btn btn-primary btn-sm"
                                                    role="button"
                                                    >Changer l&#39;image</a
                                                ></label
                                            ><input
                                                id="img-profile"
                                                class="d-none"
                                                type="file"
                                                accept="image/*"
                                                @change="onChange"
                                                ref="callButton"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary fw-bold m-0">
                                            Mot de passe
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <form
                                            method="post"
                                            @submit.prevent="updatePassword()"
                                        >
                                            <div class="mb-2 mt-2">
                                                <label class="form-label"
                                                    >Actuel</label
                                                ><input
                                                    class="form-control"
                                                    type="password"
                                                    placeholder="Actuel"
                                                    v-model="
                                                        formPassword.current_password
                                                    "
                                                />
                                            </div>
                                            <div class="mb-2 mt-2">
                                                <label class="form-label"
                                                    >Nouveau</label
                                                ><input
                                                    class="form-control"
                                                    type="password"
                                                    placeholder="Nouveau"
                                                    v-model="
                                                        formPassword.password
                                                    "
                                                />
                                            </div>
                                            <div class="mb-2 mt-2">
                                                <label class="form-label"
                                                    >Confirmation</label
                                                ><input
                                                    class="form-control"
                                                    type="password"
                                                    placeholder="Confirmation"
                                                    v-model="
                                                        formPassword.confirmation
                                                    "
                                                />
                                            </div>
                                            <div v-if="errorPassword"
                                                class="bg-danger-subtle rounded mb-2"
                                                style="padding: 5px"
                                            >
                                                Formulaire invalide
                                            </div>
                                            <button
                                                class="btn btn-primary"
                                                type="submit"
                                            >
                                                Mettre à jour
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p
                                                    class="text-primary m-0 fw-bold"
                                                >
                                                    Informations
                                                </p>
                                            </div>
                                            <div class="card-body">
                                                <form
                                                    method="post"
                                                    @submit.prevent="submit()"
                                                >
                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >Nom</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Nom"
                                                                    name="name"
                                                                    v-model="
                                                                        this
                                                                            .form
                                                                            .name
                                                                    "
                                                                />
                                                            </div>
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >Postnom</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Postnom"
                                                                    v-model="
                                                                        this
                                                                            .form
                                                                            .postname
                                                                    "
                                                                />
                                                            </div>
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >Sexe</label
                                                                ><select
                                                                    class="form-select"
                                                                    v-model="
                                                                        this
                                                                            .form
                                                                            .sexe
                                                                    "
                                                                >
                                                                    <optgroup
                                                                        label="Selectionnez"
                                                                    >
                                                                        <option
                                                                            value="homme"
                                                                        >
                                                                            Homme
                                                                        </option>
                                                                        <option
                                                                            value="femme"
                                                                        >
                                                                            Femme
                                                                        </option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >Matricule</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Matricule"
                                                                    v-model="
                                                                        this
                                                                            .form
                                                                            .matricule
                                                                    "
                                                                />
                                                            </div>
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >Poste
                                                                    occupé</label
                                                                ><select
                                                                    class="form-select"
                                                                    v-model="
                                                                        this
                                                                            .form
                                                                            .poste
                                                                    "
                                                                >
                                                                    <optgroup
                                                                        label="This is a group"
                                                                    >
                                                                        <option
                                                                            value="caissier"
                                                                            selected
                                                                        >
                                                                            Caissier
                                                                        </option>
                                                                        <option
                                                                            value="agent"
                                                                        >
                                                                            Agent
                                                                        </option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >Email</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="email"
                                                                    placeholder="Addresse mail"
                                                                    v-model="
                                                                        this
                                                                            .form
                                                                            .email
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        v-if="err"
                                                        class="bg-danger-subtle rounded mb-2"
                                                        style="padding: 5px"
                                                    >
                                                        Formulaire invalide
                                                    </div>
                                                    <div>
                                                        <button
                                                            class="btn btn-primary"
                                                            type="submit"
                                                            :disabled="disable"
                                                        >
                                                            Personnalisez
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Footer />
            </div>
            <TopPage />
        </div>
    </body>
</template>
