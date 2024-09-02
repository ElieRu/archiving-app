<script>
import { router, useForm } from "@inertiajs/vue3";
import axios from "axios";

export default {
    props: ["service"],
    data() {
        return {
            form: {
                nom: null,
                description: null,
            },
            err: false,
            display: false,
        };
    },
    methods: {
        submit() {
            this.err = true;
            this.$inertia.put("/services", this.form, {
                onSuccess: (res) => {
                    if (res.props.updated) {
                        this.err = false;
                        this.$refs.closeModal.click();
                        this.form.nom = "";
                        this.form.description = "";
                        this.$inertia.replace("/services", {
                            preserveScroll: true,
                            preserveState: true,
                        });
                    } else {
                        this.err = false;
                        this.display = true;
                    }
                },
            });
        },
    },
    computed: {
        tmpForm() {
            this.form = this.service;
            return this.form;
        },
    },
};
</script>

<template>
    <div
        id="update-service-modal"
        class="modal fade"
        role="dialog"
        tabindex="-1"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Modification</h4>
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
                                        v-model="tmpForm.nom"
                                    />
                                </div>
                                <div class="mb-2">
                                    <label
                                        class="form-label"
                                        style="
                                            font-size: 13px;
                                            margin-bottom: 5px;
                                        "
                                        >Description</label
                                    ><textarea
                                        class="form-control"
                                        placeholder="Description*"
                                        style="resize: none; height: 100px"
                                        v-model="tmpForm.description"
                                    ></textarea>
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
                                    Modifier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
