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
        DeleteModal
    },
};
</script>

<template>
    <body id="page-top">
        <div id="wrapper">
            <NavBar />
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <NavBarTop />
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
                                            <SearchBarAgents/>
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
                                                <tr>
                                                    <td>
                                                        <img
                                                            class="rounded-circle me-2"
                                                            width="30"
                                                            height="30"
                                                            src="/assets/img/avatars/avatar1.jpeg"
                                                        />Airi Satou
                                                    </td>
                                                    <td
                                                        class="d-none d-lg-table-cell"
                                                    >
                                                        Accountant
                                                    </td>
                                                    <td
                                                        class="d-none d-lg-table-cell"
                                                    >
                                                        Tokyo
                                                    </td>
                                                    <td
                                                        class="d-none d-xl-table-cell"
                                                    >
                                                        33
                                                    </td>
                                                    <td
                                                        class="d-none d-print-table-cell"
                                                    >
                                                        2008/11/28
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
                                                                <a
                                                                    class="dropdown-item"
                                                                    href="#"
                                                                    data-bs-target="#reset-modal"
                                                                    data-bs-toggle="modal"
                                                                    >Reinitialiser</a
                                                                ><a
                                                                    class="dropdown-item"
                                                                    href="#"
                                                                    data-bs-target="#delete-modal"
                                                                    data-bs-toggle="modal"
                                                                    >Supprimer</a
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
                                    <div class="row">
                                        <div
                                            class="col-md-6 align-self-center"
                                        ></div>
                                        <div class="col-md-6">
                                            <nav
                                                class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers"
                                            >
                                                <ul class="pagination">
                                                    <li
                                                        class="page-item disabled"
                                                    >
                                                        <a
                                                            class="page-link"
                                                            aria-label="Previous"
                                                            href="#"
                                                            ><span
                                                                aria-hidden="true"
                                                                >«</span
                                                            ></a
                                                        >
                                                    </li>
                                                    <li
                                                        class="page-item active"
                                                    >
                                                        <a
                                                            class="page-link"
                                                            href="#"
                                                            >1</a
                                                        >
                                                    </li>
                                                    <li class="page-item">
                                                        <a
                                                            class="page-link"
                                                            href="#"
                                                            >2</a
                                                        >
                                                    </li>
                                                    <li class="page-item">
                                                        <a
                                                            class="page-link"
                                                            href="#"
                                                            >3</a
                                                        >
                                                    </li>
                                                    <li class="page-item">
                                                        <a
                                                            class="page-link"
                                                            aria-label="Next"
                                                            href="#"
                                                            ><span
                                                                aria-hidden="true"
                                                                >»</span
                                                            ></a
                                                        >
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
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
