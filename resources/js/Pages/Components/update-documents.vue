<script>
import { router, useForm } from "@inertiajs/vue3";
import axios from "axios";

export default {
    props: ["data"],
    data() {
        return {
            form: {
                id: null,
                titre: null,
                type: null,
                description: null,
            },
            err: false
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
            this.err = true
            router.put("/documents", this.form, {
                onSuccess: updated => {
                    this.err = false
                    this.$refs.closeModal.click()
                }
            })
        },
    },
};
</script>

<template>
    <div id="update-modal" class="modal fade" role="dialog" tabindex="-1">
        <div
            class="modal-dialog modal-lg modal-fullscreen-sm-down"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Plus d&#39;Informations</h4>
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
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center mb-3">
                                <div class="border rounded p-2">
                                    <div
                                        class="d-flex justify-content-center p-4"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="-64 0 512 512"
                                            width="1em"
                                            height="1em"
                                            fill="currentColor"
                                            style="font-size: 100px"
                                        >
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"
                                            ></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h5>Proprietés</h5>
                                <div class="row">
                                    <div class="col">
                                        <ul class="list-unstyled">
                                            <li style="font-size: 13px">Nom</li>
                                            <li style="font-size: 13px">
                                                Taille
                                            </li>
                                            <li style="font-size: 13px">
                                                Extension
                                            </li>
                                            <li style="font-size: 13px">
                                                Date de création
                                            </li>
                                            <li style="font-size: 13px">
                                                Date de mise à jour
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col text-end">
                                        <ul class="list-unstyled">
                                            <li style="font-size: 13px">
                                                {{ data.titre }}
                                            </li>
                                            <li style="font-size: 13px">
                                                {{ data.taille }} bytes
                                            </li>
                                            <li style="font-size: 13px">
                                                {{ data.extension }}
                                            </li>
                                            <li style="font-size: 13px">
                                                {{ created_at }}
                                            </li>
                                            <li style="font-size: 13px">
                                                {{ updated_at }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
