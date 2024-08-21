<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
import ServiceModal from "./Components/service-modal.vue";
import DeleteServiceModal from "./Components/delete-service-modal.vue";
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
    },
    props: ["user"],
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
                                <h3 style="margin: 0px">
                                    <a href="#">Services</a>
                                </h3>
                                <h3
                                    style="
                                        margin-bottom: 0px;
                                        margin-right: 10px;
                                        margin-left: 10px;
                                    "
                                >
                                    •
                                </h3>
                                <h3
                                    class="text-body-secondary"
                                    style="margin: 0px; margin-bottom: 0px"
                                >
                                    Name
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
                                    /></label>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-2">
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div
                                            class="d-flex justify-content-between align-items-center"
                                        >
                                            <h4
                                                style="
                                                    text-decoration: underline;
                                                "
                                            >
                                                <a href="services-more">Link</a>
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
                                            Nullam id dolor id nibh ultricies
                                            vehicula ut id elit. Cras justo
                                            odio, dapibus ac facilisis in,
                                            egestas eget quam. Donec id elit non
                                            mi porta gravida at eget metus.
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
    </body>
</template>
