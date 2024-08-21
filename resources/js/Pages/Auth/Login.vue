<script>
import axios from "axios";
import { router } from "@inertiajs/vue3";

export default {
    data() {
        return {
            form: {
                email: "admin@gmail.com",
                password: "@Pass123",
                remember: null,
            },
            disable: false,
            err: false,
        };
    },

    methods: {
        submit() {
            this.disable = false;
            this.err = true;
            axios
                .post("/login", this.form)
                .then((res) => {
                    router.replace("/");
                })
                .catch((err) => {
                    this.disable = true;
                    this.err = false;
                });
        },
    },
};
</script>

<template>
    <body class="bg-gradient-primary" style="background: white">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">
                                                Bienvenu!
                                            </h4>
                                        </div>
                                        <form
                                            class="user"
                                            @submit.prevent="submit()"
                                            method="post"
                                        >
                                            <div class="mb-3">
                                                <input
                                                    id="exampleInputEmail"
                                                    class="form-control form-control-user"
                                                    type="email"
                                                    aria-describedby="emailHelp"
                                                    placeholder="Addresse mail"
                                                    name="email"
                                                    v-model="form.email"
                                                />
                                            </div>
                                            <div class="mb-3">
                                                <input
                                                    id="exampleInputPassword"
                                                    class="form-control form-control-user"
                                                    type="password"
                                                    placeholder="Mot de passe"
                                                    name="password"
                                                    v-model="form.password"
                                                />
                                            </div>
                                            <div
                                                v-if="disable"
                                                class="mb-3 bg-danger-subtle p-1"
                                                style="border-radius: 20px"
                                            >
                                                <span
                                                    style="
                                                        font-size: 13px;
                                                        margin-left: 8px;
                                                    "
                                                    >Formulaire invalide</span
                                                >
                                            </div>
                                            <div class="mb-3">
                                                <div
                                                    class="custom-control custom-checkbox small"
                                                >
                                                    <div
                                                        class="form-check d-flex align-items-center"
                                                    >
                                                        <input
                                                            id="formCheck-1"
                                                            class="form-check-input custom-control-input"
                                                            type="checkbox"
                                                            v-model="
                                                                form.remember
                                                            "
                                                        /><label
                                                            class="form-check-label custom-control-label"
                                                            for="formCheck-1"
                                                            style="
                                                                margin-left: 8px;
                                                            "
                                                            >Se rappeler de
                                                            moi</label
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                class="btn btn-primary d-block btn-user w-100"
                                                type="submit"
                                                :disabled="err"
                                            >
                                                Connexion
                                            </button>
                                            <!-- <hr /> -->
                                        </form>
                                        <!-- <div class="text-center">
                                            <a
                                                class="small"
                                                href="forgot-password"
                                                >Mot De Passe Oublié<br />?</a
                                            >
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</template>
