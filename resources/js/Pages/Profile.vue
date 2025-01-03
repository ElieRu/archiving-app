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
                current_password: "",
                password: "",
                confirmation: "",
            },
            image: "",
            disable: false,
            err: false,
            disPass: false,
            validForm: false,
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
            this.disPass = true;
            this.validForm = false;
            this.$inertia.put(
                "/profile",
                this.formPassword,
                {
                    onSuccess: ({ props }) => {
                        if (props.errorPassword) {
                            this.disPass = false;
                            this.validForm = true;
                        } else {
                            router.post("/logout")
                        }
                    },
                },
                { preserveScroll: true, preserveState: true }
            );
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
                                                    >Upgrade image</a
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
                                            Password
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <form
                                            method="post"
                                            @submit.prevent="updatePassword()"
                                        >
                                            <div class="mb-2 mt-2">
                                                <label class="form-label"
                                                    >Current</label
                                                ><input
                                                    class="form-control"
                                                    type="password"
                                                    placeholder="Current"
                                                    v-model="
                                                        formPassword.current_password
                                                    "
                                                />
                                            </div>
                                            <div class="mb-2 mt-2">
                                                <label class="form-label"
                                                    >New</label
                                                ><input
                                                    class="form-control"
                                                    type="password"
                                                    placeholder="New"
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
                                            <div
                                                v-if="validForm"
                                                class="bg-danger-subtle rounded mb-2"
                                                style="padding: 5px"
                                            >
                                                Invalide Form
                                            </div>
                                            <button
                                                class="btn btn-primary"
                                                type="submit"
                                                :disabled="disPass"
                                            >
                                                <span
                                                    v-if="disPass"
                                                    style="margin-right: 5px"
                                                    class="spinner-border spinner-border-sm"
                                                    role="status"
                                                ></span
                                                ><span>Update</span>
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
                                                                    >Name</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Name"
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
                                                                    >Postname</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Postname"
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
                                                                    >Sex</label
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
                                                                            value="male"
                                                                        >
                                                                            Male
                                                                        </option>
                                                                        <option
                                                                            value="Female"
                                                                        >
                                                                            Female
                                                                        </option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >ID</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="ID"
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
                                                                    >Post</label
                                                                ><select
                                                                    class="form-select"
                                                                    v-model="
                                                                        this
                                                                            .form
                                                                            .poste
                                                                    "
                                                                    :disabled="user.role"
                                                                >
                                                                    <optgroup
                                                                        label="Selectionnez"
                                                                    >
                                                                        <option
                                                                            value="paymaster"
                                                                            selected
                                                                        >
                                                                            Paymaster
                                                                        </option>
                                                                        <option
                                                                            value="agent"
                                                                        >
                                                                            Agent
                                                                        </option>
                                                                        <option
                                                                            v-if="user.role"
                                                                            value="admin"
                                                                        >
                                                                            Admin
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
                                                                    placeholder="Mail Adress"
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
                                                        v-if="validForm"
                                                        class="bg-danger-subtle rounded mb-2"
                                                        style="padding: 5px"
                                                    >
                                                        Invalid Form
                                                    </div>
                                                    <div>
                                                        <button
                                                            class="btn btn-primary"
                                                            type="submit"
                                                            :disabled="disable"
                                                        >
                                                            <span
                                                                v-if="disable"
                                                                style="
                                                                    margin-right: 5px;
                                                                "
                                                                class="spinner-border spinner-border-sm"
                                                                role="status"
                                                            ></span
                                                            ><span
                                                                >Update</span
                                                            >
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
