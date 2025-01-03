<script>
import { router, useForm } from "@inertiajs/vue3";
import axios from "axios";

export default {
    props: ["users", "service_id"],
    data() {
        return {
            users_checked: [],
            search: "",
            datas: useForm({
                users_checked: null,
                id: null,
            }),
        };
    },
    methods: {
        submit() {
            this.datas.users_checked = this.users_checked;
            this.datas.id = this.id;
            
            this.datas.post(`/remove-members/${this.service_id}`, {
                onSuccess: () => {
                    this.users_checked = [];
                    this.$refs.closeBtn.click();
                    router.replace(`/services/${this.service_id}`, {
                        preserveScroll: true,
                        preserveState: true
                    })
                }
            });
        },
    },
    computed: {
        filter_datas() {
            return Object.values(this.users).filter((user) =>
                user.name.toLowerCase().includes(this.search.toLowerCase())
            );
        },
    },
};
</script>

<template>
    <div id="remove-members" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Remove members</h4>
                    <button
                        class="btn-close"
                        type="button"
                        aria-label="Close"
                        data-bs-dismiss="modal"
                        ref="closeBtn"
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
                                placeholder="Search"
                                v-model="search"
                            />
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 29px">#</th>
                                        <th>All members</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(user, index) in filter_datas">
                                        <td style="width: 29px">
                                            <input
                                                :id="`checked-${user.id}`"
                                                type="checkbox"
                                                :value="user.id"
                                                v-model="this.users_checked"
                                            />
                                        </td>
                                        <td>
                                            <label
                                                class="form-label text-capitalize"
                                                style="
                                                    margin-bottom: 0px;
                                                    cursor: pointer;
                                                "
                                                :for="`checked-${user.id}`"
                                                >{{ user.name }}
                                                {{ user.postname }}</label
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td style="width: 29px">#</td>
                                        <td>All members</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button
                        class="btn btn-danger"
                        type="button"
                        style="width: 100%"
                        :disabled="!this.users_checked.length"
                        @click="submit()"
                    >
                        Remove
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
