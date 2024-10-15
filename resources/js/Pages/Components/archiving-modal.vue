<script>
import { useForm } from "@inertiajs/vue3";
import axios from "axios";

export default {
    props: ["etageres", "docId"],
    data() {
        return {
            category: "agents",
            checkedEtageres: [],
            searchQuery: "",
            formArchiver: useForm({
                checkedEtageres: "",
                docId: "",
            }),
        };
    },
    mounted() {},
    computed: {
        filteredDatas() {
            return Object.values(this.etageres).filter((etagere) =>
                etagere.nom.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        },
    },
    methods: {
        selectedEtageres() {
            this.formArchiver.checkedEtageres = this.checkedEtageres;
            this.formArchiver.docId = this.docId;

            axios
                .post(`/documents/archiving`, this.formArchiver)
                .then((res) => {
                    this.$refs.closeModal.click();
                    this.checkedEtageres = [];
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>

<template>
    <div id="archiving-modal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Archiver</h4>
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
                        <div
                            class="bg-white border rounded d-flex align-items-center p-1"
                        >
                            <input
                                class="border-0 shadow-none form-control form-control-sm"
                                type="search"
                                aria-controls="dataTable"
                                placeholder="Recherche"
                                v-model="searchQuery"
                            />
                        </div>
                    </div>
                    <div class="mt-3">
                        <div
                            class="table-responsive"
                        >
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tous les etagères</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(etagere, index) in filteredDatas"
                                        :key="index"
                                    >
                                        <td>
                                            <input
                                                :id="`checked-${etagere.id}`"
                                                type="checkbox"
                                                :value="etagere"
                                                v-model="checkedEtageres"
                                            />
                                        </td>
                                        <td class="text-capitalize">
                                            <label
                                                :for="`checked-${etagere.id}`"
                                                style="cursor: pointer"
                                                >{{ etagere.nom }}</label
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>#</td>
                                        <td>Tous les etagères</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button
                        style="width: 100%"
                        class="btn btn-primary"
                        type="button"
                        @click="selectedEtageres()"
                        :disabled="
                            !checkedEtageres.length
                        "
                    >
                        Archiver
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
