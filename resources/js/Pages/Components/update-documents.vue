<script>
import { router, useForm } from "@inertiajs/vue3";
import axios from "axios";

export default {
    props: ["data", "updated", "classeur"],
    data() {
        return {
            form: {
                id: null,
                titre: null,
                type: null,
                description: null,
            },
            err: false,
            display: false,
        };
    },
    computed: {
        tmpForm() {
            this.form = this.data;
            return this.form;
        },
    },
    methods: {
        submit() {
            this.err = true;
            // alert(this.classeur.id)
            axios
                .put(`/documents/classeurs/${this.classeur.id}`, this.form)
                .then((res) => {
                    try {
                        if (res.status === 200) {
                            this.err = false;
                            this.$refs.closeModal.click();
                        }
                    } catch (error) {}
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
    <div id="update-modal" class="modal fade" role="dialog" tabindex="-1">
        <div
            class="modal-dialog"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Update</h4>
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
                                <div class="mb-1">
                                    <label
                                        class="form-label"
                                        style="
                                            font-size: 13px;
                                            margin-bottom: 5px;
                                        "
                                        >Title</label
                                    ><input
                                        class="form-control"
                                        type="text"
                                        placeholder="Titre"
                                        v-model="tmpForm.titre"
                                    />
                                </div>
                                <div class="mb-1">
                                    <label
                                        class="form-label"
                                        style="
                                            font-size: 13px;
                                            margin-bottom: 5px;
                                        "
                                        >Type</label
                                    ><select
                                        class="form-select"
                                        v-model="tmpForm.type"
                                    >
                                        <optgroup label="Selection">
                                            <option
                                                value="administratif"
                                                selected
                                            >
                                                Administration
                                            </option>
                                            <option value="control">
                                                Control
                                            </option>
                                            <option value="technic">
                                                Technic
                                            </option>
                                        </optgroup>
                                    </select>
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
                                    class="bg-danger-subtle rounded mb-2"
                                    style="padding: 5px"
                                >
                                    Invalid Formuler
                                </div>
                                <button
                                    class="btn btn-primary"
                                    style="width: 100%"
                                    type="submit"
                                    :disabled="err"
                                >
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
