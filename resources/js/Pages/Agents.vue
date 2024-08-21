<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import SearchBarAgents from "./Components/search-bar-agents.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
import ResetModal from "./Components/reset-modal.vue";
import DeleteModal from "./Components/delete-modal.vue";
import PaginationAgents from "./Components/pagination-agents.vue";
import { Link } from '@inertiajs/vue3'

export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
        SearchBarAgents,
        ResetModal,
        DeleteModal,
        PaginationAgents,
        Link
    },
    props: ['user', 'users'],
    datas() {
        return {
            // search: ""
        }
    },
    
};
</script>

<template>
    <body id="page-top">
        <div id="wrapper">
            <NavBar :role="user.role" />
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <NavBarTop :user="user" />
                    <div id="content">
                        <div class="container-fluid">
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <h3 class="text-dark mb-4">Agents</h3>
                                <a
                                    class="btn btn-primary btn-sm"
                                    role="button"
                                    href="agents-add"
                                    >Ajouter</a
                                >
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">
                                        Liste des agents
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-nowrap">
                                            <div
                                                id="dataTable_length-1"
                                                class="dataTables_length"
                                                aria-controls="dataTable"
                                            ></div>
                                        </div>
                                        <div class="col-md-6">
                                            <SearchBarAgents />
                                        </div>
                                    </div>
                                    <div
                                        id="dataTable"
                                        class="table-responsive table mt-2"
                                        role="grid"
                                        aria-describedby="dataTable_info"
                                        style="overflow: initial"
                                    >
                                        <table
                                            id="dataTable"
                                            class="table my-0"
                                        >
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th
                                                        class="d-none d-lg-table-cell"
                                                    >
                                                        Adresse mail
                                                    </th>
                                                    <th
                                                        class="d-none d-lg-table-cell"
                                                    >
                                                        Poste
                                                    </th>
                                                    <th
                                                        class="d-none d-xl-table-cell"
                                                    >
                                                        Sexe
                                                    </th>
                                                    <th
                                                        class="d-none d-print-table-cell"
                                                    >
                                                        Matricule
                                                    </th>
                                                    <th
                                                        class="d-flex justify-content-center"
                                                    >
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(user, index) in this.users.data" :key="index">
                                                    <td class="text-capitalize">
                                                        <div class="d-flex">
                                                            <img
                                                                class="rounded-circle me-2"
                                                                width="30"
                                                                height="30"
                                                                :src="'/storage'+user.image"
                                                            />{{ user.name }} {{ user.postname }}
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="d-none d-lg-table-cell text-lowercase"
                                                    >
                                                        {{ user.email }}
                                                    </td>
                                                    <td
                                                        class="d-none d-lg-table-cell text-capitalize"
                                                    >
                                                        {{ user.poste }}
                                                    </td>
                                                    <td
                                                        class="d-none d-xl-table-cell text-capitalize"
                                                    >
                                                        {{ user.sexe }}
                                                    </td>
                                                    <td
                                                        class="d-flex justify-content-center"
                                                    >
                                                        <div class="dropstart">
                                                            <button
                                                                class="btn btn-primary link-body-emphasis bg-transparent border-white"
                                                                aria-expanded="false"
                                                                data-bs-toggle="dropdown"
                                                                type="button"
                                                            >
                                                                <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="-192 0 512 512"
                                                                    width="1em"
                                                                    height="1em"
                                                                    fill="currentColor"
                                                                >
                                                                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                                                    <path
                                                                        d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"
                                                                    ></path>
                                                                </svg>
                                                            </button>
                                                            <div
                                                                class="dropdown-menu"
                                                            >
                                                                <Link
                                                                    style="cursor: pointer;"
                                                                    class="dropdown-item"
                                                                    :href="`/agents-add/${user.id}`"
                                                                    method="get"
                                                                    as="button"
                                                                    type="button"
                                                                    >Mettre à jour</Link
                                                                >
                                                                <Link
                                                                    style="cursor: pointer;"
                                                                    class="dropdown-item"
                                                                    href="/agents"
                                                                    method="put"
                                                                    as="button"
                                                                    type="button"
                                                                    data-bs-target="#reset-modal"
                                                                    data-bs-toggle="modal"
                                                                    :data="{id: user.id}"
                                                                    >Reinitialiser</Link
                                                                >
                                                                <Link
                                                                    style="cursor: pointer;"
                                                                    class="dropdown-item"
                                                                    href="/agents"
                                                                    method='delete'
                                                                    as="button"
                                                                    type="button"
                                                                    :data="{id: user.id}"
                                                                    >Supprimer</Link
                                                                >
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>
                                                        <strong>Nom</strong>
                                                    </td>
                                                    <td
                                                        class="d-none d-lg-table-cell"
                                                    >
                                                        <strong
                                                            >Adresse
                                                            mail</strong
                                                        >
                                                    </td>
                                                    <td
                                                        class="d-none d-lg-table-cell"
                                                    >
                                                        <strong>Poste</strong>
                                                    </td>
                                                    <td
                                                        class="d-none d-xl-table-cell"
                                                    >
                                                        <strong>Sexe</strong>
                                                    </td>
                                                    <td
                                                        class="d-none d-print-table-cell"
                                                    >
                                                        <strong
                                                            >Matricule</strong
                                                        >
                                                    </td>
                                                    <td
                                                        class="d-flex justify-content-center"
                                                    >
                                                        <strong>Actions</strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <PaginationAgents :datas="users" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Footer />
            </div>
            <TopPage />
        </div>
        <ResetModal/>
        <DeleteModal/>
    </body>
</template>
