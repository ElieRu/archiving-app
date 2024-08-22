<script>
import { router, useForm } from "@inertiajs/vue3";
import axios from "axios";

export default {
    props: ["data", "updated"],
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
        created_at() {
            const created = new Date(this.data.created_at);
            return `${created.getDate()}-${created.getMonth()}-${created.getFullYear()} à ${created.getHours()}:${created.getMinutes()}:${created.getSeconds()}`;
        },
        updated_at() {
            const updated = new Date(this.data.updated_at);
            return `${updated.getDate()}-${updated.getMonth()}-${updated.getFullYear()} à ${updated.getHours()}:${updated.getMinutes()}:${updated.getSeconds()}`;
        },
        tmpForm() {
            this.form = this.data;
            return this.form;
        },
    },
    methods: {
        submit() {
            this.err = true;
            axios
                .put("/documents", this.form)
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
                                <div class="mb-1">
                                    <label
                                        class="form-label"
                                        style="
                                            font-size: 13px;
                                            margin-bottom: 5px;
                                        "
                                        >Titre</label
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
                                                Administratif
                                            </option>
                                            <option value="control">
                                                Control
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
