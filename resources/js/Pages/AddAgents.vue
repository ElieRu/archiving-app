<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
import OffCanvas from "./Components/off-canvas.vue";
import { router, useForm } from "@inertiajs/vue3";
import axios from "axios";
export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
        OffCanvas
    },

    props: ["user"],

    data() {
        return {
            form: useForm({
                name: null,
                postname: null,
                sexe: null,
                matricule: null,
                poste: null,
                email: null,
                password: null,
            }),
            err: false,
            id: null,
            switch: false,
        };
    },

    mounted() {
        const url = new URL(window.location.href)
        const pathname = url.pathname.split('/')
        const userId = parseInt(pathname[pathname.length-1])
        // parseInt(userId)
        console.log(typeof userId)
        if (userId) {
            this.switch = true;
            this.form = this.user;
        } else {
            this.form = {
                name: null,
                postname: null,
                sexe: null,
                matricule: null,
                poste: null,
                email: null,
                password: null,
            }
        }
    },

    methods: {
        create() {
            axios
                .post("/agents", this.form)
                .then((res) => {
                    router.replace("/agents");
                })
                .catch((err) => {
                    this.err = true;
                });
        },
        update() {
            axios
                .put("/agents-add", this.form)
                .then((res) => {
                    router.replace("/agents");
                })
                .catch((err) => {
                    this.err = true;
                });
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
                        <div
                            class="d-flex justify-content-between align-items-center"
                        >
                            <h3 class="text-dark mb-4">Add new agent</h3>
                            <a
                                class="btn btn-primary btn-sm"
                                role="button"
                                href="/agents"
                                >Back</a
                            >
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">
                                    Fill the form
                                </p>
                            </div>
                            <div class="card-body">
                                <form
                                    method="post"
                                    @submit.prevent="
                                        !this.switch ? create() : update()
                                    "
                                >
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
                                                    >Name</label
                                                ><input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="Name"
                                                    v-model="form.name"
                                                />
                                            </div>
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
                                                    >Postname</label
                                                ><input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="Postname"
                                                    v-model="form.postname"
                                                />
                                            </div>
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
                                                    >Sex</label
                                                ><select
                                                    class="form-select"
                                                    v-model="form.sexe"
                                                >
                                                    <optgroup
                                                        label="Selectionnez"
                                                    >
                                                        <option
                                                            value="male"
                                                            selected
                                                        >
                                                            Male
                                                        </option>
                                                        <option value="female">
                                                            Female
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
                                                    >ID</label
                                                ><input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="ID"
                                                    v-model="form.matricule"
                                                />
                                            </div>
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
                                                    >Post</label
                                                ><select
                                                    class="form-select"
                                                    v-model="form.poste"
                                                >
                                                    <optgroup
                                                        label="Personnels"
                                                    >
                                                        <option
                                                            value="paymaster"
                                                            selected
                                                        >
                                                            Paymaster
                                                        </option>
                                                        <option value="agent">
                                                            Agent
                                                        </option>
                                                        <option value="archivist">
                                                            Archivist
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
                                                    >Email</label
                                                ><input
                                                    class="form-control"
                                                    type="email"
                                                    placeholder="Mail Address"
                                                    v-model="form.email"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        v-if="err"
                                        class="bg-danger-subtle rounded mb-2"
                                        style="padding: 5px"
                                    >
                                        Invalid Form
                                    </div>
                                    <div>
                                        <button
                                            class="btn btn-primary"
                                            type="submit"
                                        >
                                            {{
                                                !this.switch
                                                    ? "Agent created"
                                                    : "Information Updated"
                                            }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <Footer />
            </div>
            <TopPage />
        </div>
    </body>
    <OffCanvas :user="user" />
</template>
