<script>
import { useForm } from "@inertiajs/vue3";
import axios from "axios";

export default {
    props: ["users", "services", "classeurs", "docId"],
    data() {
        return {
            category: "agents",
            checkedUsers: [],
            checkedServices: [],
            checkedClasseurs: [],
            checkedClasseurServices: [],
            searchQuery: "",
            formShare: useForm({
                usersCategory: "",
                checkedUsers: "",
                checkedServices: "",
                checkedClasseurs: "",
                checkedClasseurServices: "",
                docId: "",
            }),
        };
    },
    mounted() {},
    computed: {
        filteredDatas() {
            if (this.category == "agents") {
                return Object.values(this.users).filter((user) =>
                    user.name
                        .toLowerCase()
                        .includes(this.searchQuery.toLowerCase())
                );
            }
            if (this.category == "services") {
                return Object.values(this.services).filter((service) =>
                    service.nom
                        .toLowerCase()
                        .includes(this.searchQuery.toLowerCase())
                );
            }
            if (this.category == "classeurs") {
                return Object.values(this.classeurs).filter((classeur) =>
                    classeur.nom
                        .toLowerCase()
                        .includes(this.searchQuery.toLowerCase())
                );
            }
        },
    },
    methods: {
        selectCategory(category) {
            this.formShare.usersCategory = category;
            this.checkedServices = [];
            this.checkedClasseurs = [];
            this.checkedUsers = [];
            this.checkedClasseurServices = [];
            this.category = category;
        },
        selectedUsers() {
            this.formShare.checkedUsers = this.checkedUsers;
            this.formShare.checkedServices = this.checkedServices;
            this.formShare.checkedClasseurs = this.checkedClasseurs;
            this.formShare.checkedClasseurServices = this.checkedClasseurServices;
            this.formShare.docId = this.docId;
            axios
                .post(`/documents/share`, this.formShare)
                .then((res) => {
                    this.$refs.closeModal.click();
                    this.checkedUsers = [];
                    this.checkedServices = [];
                    this.checkedClasseurs = [];
                    this.checkedClasseurServices = [];
                    this.category = "agents";
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>

<template>
    <div id="share-modal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Share document</h4>
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
                                placeholder="Search"
                                v-model="searchQuery"
                            />
                            <div class="dropdown">
                                <button
                                    class="btn btn-primary btn-sm border-0"
                                    aria-expanded="false"
                                    data-bs-toggle="dropdown"
                                    type="button"
                                    style="height: 29px"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"
                                        width="1em"
                                        height="1em"
                                        fill="currentColor"
                                    >
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"
                                        ></path>
                                    </svg>
                                </button>
                                <div class="dropdown-menu">
                                    <h6 class="dropdown-header">Categories</h6>
                                    <a
                                        class="dropdown-item"
                                        style="cursor: pointer"
                                        @click.prevent="
                                            selectCategory('agents')
                                        "
                                        >Agents</a
                                    ><a
                                        class="dropdown-item"
                                        style="cursor: pointer"
                                        @click.prevent="
                                            selectCategory('services')
                                        "
                                        >Services</a
                                    ><a
                                        class="dropdown-item"
                                        style="cursor: pointer"
                                        @click.prevent="
                                            selectCategory('classeurs')
                                        "
                                        >Workbooks</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div
                            class="table-responsive"
                            v-if="this.category === 'agents'"
                        >
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>All agents</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(user, index) in filteredDatas"
                                        :key="index"
                                    >
                                        <td>
                                            <input
                                                :id="`checked-${user.id}`"
                                                type="checkbox"
                                                :value="user"
                                                v-model="checkedUsers"
                                            />
                                        </td>
                                        <td class="text-capitalize">
                                            <label
                                                :for="`checked-${user.id}`"
                                                style="cursor: pointer"
                                                >{{ user.name }}
                                                {{ user.postname }}</label
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>#</td>
                                        <td>All agents</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div
                            class="table-responsive"
                            v-if="this.category === 'services'"
                        >
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>All services</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(
                                            service, index
                                        ) in filteredDatas"
                                        :key="index"
                                    >
                                        <td>
                                            <input
                                                :id="`checked-${service.id}`"
                                                type="checkbox"
                                                :value="service"
                                                v-model="checkedServices"
                                            />
                                        </td>
                                        <td class="text-capitalize">
                                            <label
                                                :for="`checked-${service.id}`"
                                                style="cursor: pointer"
                                                >{{ service.nom }}</label
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>#</td>
                                        <td>All services</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div
                            class="table-responsive"
                            v-if="this.category === 'classeurs'"
                        >
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>All Workbooks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(
                                            classeur, index
                                        ) in filteredDatas"
                                        :key="index"
                                    >
                                        <td>
                                            <input
                                                :id="`checked-${classeur.id}`"
                                                type="checkbox"
                                                :value="classeur.id"
                                                v-model="checkedClasseurs"
                                            />
                                        </td>
                                        <td class="text-capitalize">
                                            <label
                                                :for="`checked-${classeur.id}`"
                                                style="cursor: pointer"
                                                >{{ classeur.nom }}</label
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>#</td>
                                        <td>All Workbooks</td>
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
                        @click="selectedUsers()"
                        :disabled="
                            !checkedUsers.length &&
                            !checkedServices.length &&
                            !checkedClasseurs.length &&
                            !checkedClasseurServices.length
                        "
                    >
                        Share
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
