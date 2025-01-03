<script>
import { router, useForm } from "@inertiajs/vue3";
import axios from "axios";

export default {
    props: ["role"],
    data() {
        return {
            form: {
                nom: null,
            },
            err: false,
            display: false,
        };
    },
    methods: {
        submit() {
            this.err = true;
            axios
                .post("/services", this.form)
                .then((res) => {
                    this.err = false;
                    this.$refs.closeModal.click();
                    this.form.nom = "";
                    this.$inertia.replace('/services', {preserveScroll: true, preserveState: true})
                })
                .catch((err) => {
                    this.err = false;
                    this.display = true;
                });
        },
    },
};
</script>

<template>
    <div
        id="add-service-modal"
        class="modal fade"
        role="dialog"
        tabindex="-1"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Création</h4>
                    <button
                        class="btn-close"
                        type="button"
                        aria-label="Close"
                        data-bs-dismiss="modal"
                        ref="closeModal"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" @submit.prevent="submit()">
                                <div class="mb-2">
                                    <label
                                        class="form-label"
                                        style="
                                            font-size: 13px;
                                            margin-bottom: 5px;
                                        "
                                        >Nom</label
                                    ><input
                                        class="form-control"
                                        type="text"
                                        placeholder="Nom"
                                        v-model="this.form.nom"
                                    />
                                </div>
                                <div
                                    v-if="display"
                                    class="bg-danger-subtle rounded my-2"
                                    style="padding: 5px"
                                >
                                    Formulaire invalide
                                </div>
                                <button
                                    class="btn btn-primary"
                                    style="width: 100%"
                                    type="submit"
                                    :disabled="err"
                                >
                                    Créer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
