<!-- <script>
import axios from "axios";
import { router } from "@inertiajs/vue3";

export default {
    data() {
        return {
            form: {
                email: email,
                password: null,
                password_confirmation: null,
                token: token
            },
            disable: false,
        };
    },

    props: ['email', 'token'],

    methods: {
        submit() {
            this.disable = true;
            axios
                .post("/forgot-password", this.form)
                .then((res) => {
                    // router.replace("/");
                    alert("link sent already");
                })
                .catch((err) => {
                    if (err.response.data.message) {
                        this.disable = false;
                        console.log(err.response.data.message);
                    }
                });
        },
    },
};
</script> -->

<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps(['email', 'token'])

console.log(props);

const resetPassword = useForm({
    email: props.email,
    password: null,
    password_confirmation: null,
    token: props.token
})

</script>

<template>
    <body class="bg-gradient-primary" style="background: white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-2">
                                                Récuperer le Mot De Passe
                                            </h4>
                                        </div>
                                        <form
                                            class="user"
                                            @submit.prevent="resetPassword.post('/reset-password')"
                                        >
                                            <div class="mb-3">
                                                <input
                                                    id="exampleInputEmail"
                                                    class="form-control form-control-user"
                                                    type="password"
                                                    aria-describedby="emailHelp"
                                                    placeholder="Nouveau"
                                                    name="password"
                                                    v-model="form.password"
                                                />
                                            </div>
                                            <div class="mb-3">
                                                <input
                                                    id="exampleInputEmailPassword"
                                                    class="form-control form-control-user"
                                                    type="password"
                                                    aria-describedby="emailHelp"
                                                    placeholder="Confirmation"
                                                    name="password_confirmation"
                                                    v-model="form.password_confirmation"
                                                />
                                            </div>
                                            <button
                                                class="btn btn-primary d-block btn-user w-100"
                                                type="submit"
                                                :disabled="disable"
                                            >
                                                Récuperer le Mot De Passe
                                            </button>
                                        </form>
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
