<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
import ServiceModal from "./Components/service-modal.vue";
import DeleteServiceModal from "./Components/delete-service-modal.vue";
import AddServiceModal from "./Components/add-service-modal.vue";
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
        ServiceModal,
        DeleteServiceModal,
        AddServiceModal,
        Link,
    },
    props: ["user", "services"],
    data() {
        return {
            search: "",
        };
    },
    computed: {
        filteredDatas() {
            return Object.values(this.services).filter((service) =>
                service.nom.toLowerCase().includes(this.search.toLowerCase())
            );
        },
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
                    <div class="container-fluid">
                        <div
                            class="d-flex justify-content-between align-items-center"
                        >
                            <div class="d-flex">
                                <h3
                                    class="text-body-secondary"
                                    style="margin: 0px; margin-bottom: 0px"
                                >
                                    Services
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <div
                                    id="dataTable_length"
                                    class="dataTables_length"
                                    aria-controls="dataTable"
                                ></div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    id="dataTable_filter"
                                    class="text-md-end dataTables_filter"
                                >
                                    <label class="form-label"
                                        ><input
                                            class="form-control form-control-sm"
                                            type="search"
                                            aria-controls="dataTable"
                                            placeholder="Recherche"
                                            v-model="search"
                                    /></label>
                                    <button
                                        class="btn btn-primary btn-sm"
                                        style="height: 29px;"
                                        data-bs-target="#add-service-modal"
                                        data-bs-toggle="modal"
                                        v-if="this.user.role == 'admin'"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="-32 0 512 512"
                                            width="1em"
                                            height="1em"
                                            fill="currentColor"
                                        >
                                            <path
                                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
                                            ></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-2">
                            <div
                                class="col-12 col-md-6 col-xl-4"
                                v-for="(service, index) in filteredDatas"
                            >
                                <div class="card">
                                    <div class="card-body">
                                        <div
                                            class="d-flex justify-content-between align-items-center"
                                        >
                                            <h4
                                                style="
                                                    text-decoration: underline;
                                                "
                                                class="text-capitalize"
                                            >
                                                <Link
                                                    :href="`/services/${service.id}`"
                                                    >{{
                                                        service.nom.length < 20
                                                            ? service.nom
                                                            : service.nom.slice(
                                                                  0,
                                                                  20
                                                              ) + "..."
                                                    }}</Link
                                                >
                                            </h4>
                                            <div>
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-primary bg-transparent border-0"
                                                        aria-expanded="false"
                                                        data-bs-toggle="dropdown"
                                                        type="button"
                                                    >
                                                        <svg
                                                            class="text-body-emphasis"
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
                                                    <div class="dropdown-menu">
                                                        <a
                                                            class="dropdown-item"
                                                            href="#"
                                                            >Ajouter</a
                                                        ><a
                                                            class="dropdown-item"
                                                            href="#"
                                                            data-bs-target="#service-modal"
                                                            data-bs-toggle="modal"
                                                            >Modifier</a
                                                        ><a
                                                            class="dropdown-item"
                                                            href="#"
                                                            data-bs-target="#delete-service-modal"
                                                            data-bs-toggle="modal"
                                                            >Supprimer</a
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="card-text">
                                            {{
                                                service.description
                                                    ? service.description
                                                          .length < 60
                                                        ? service.description
                                                        : service.description.slice(
                                                              0,
                                                              60
                                                          ) + "..."
                                                    : "Description**"
                                            }}
                                        </p>
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
        <ServiceModal />
        <DeleteServiceModal />
        <AddServiceModal :role="user.role" />
    </body>
</template>
