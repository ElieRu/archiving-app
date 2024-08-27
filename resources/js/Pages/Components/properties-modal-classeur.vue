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
};
</script>

<template>
    <div id="properties-modal-classeur" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Proprietés</h4>
                    <button
                        class="btn-close"
                        type="button"
                        aria-label="Close"
                        data-bs-dismiss="modal"
                        ref="closeModal"
                    ></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div>
                            <div class="row">
                                <div class="col">
                                    <ul class="list-unstyled">
                                        <li style="font-size: 13px">Nom</li>
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
                                            {{ data.nom }}
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
                            <div style="margin-top: -18px">
                                <span style="font-size: 13px">Description</span>
                                <p
                                    class="text-capitalize"
                                    style="font-size: 13px"
                                >
                                    {{ data.description ? data.description : "Description**" }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 d-flex justify-content-center">
                    <button
                        class="btn btn-primary"
                        type="button"
                        data-bs-dismiss="modal"
                        style="width: 100%;"
                    >
                        Fermer</button
                    >
                </div>
            </div>
        </div>
    </div>
</template>
