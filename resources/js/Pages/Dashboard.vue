<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import OffCanvas from "./Components/off-canvas.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
import Services from "./Services.vue";
export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
        OffCanvas
    },
    props: [
        "user", 
        "users",
        "classeurs", 
        "documents", 
        "services",
        "etageres",
        "etageres_classeurs",
        "etageres_documents",
        "classeurs_services",
        "documents_services",
        "classeursServicesConcernes"
    ],
    mounted() {}
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
                            class="d-flex justify-content-between align-items-center mb-4"
                        >
                            <h3 class="text-dark mb-0">Dashboard</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div
                                    class="card shadow border-start-primary py-2"
                                >
                                    <div class="card-body">
                                        <div
                                            class="row align-items-center no-gutters"
                                        >
                                            <div class="col me-2">
                                                <div
                                                    class="text-uppercase text-primary fw-bold text-xs mb-1"
                                                >
                                                    <span>Workbook{{ this.classeurs > 1 ? 's' : '' }}</span>
                                                </div>
                                                <div
                                                    class="text-dark fw-bold h5 mb-0"
                                                >
                                                    <span>{{ this.classeurs ? this.classeurs : 'Aucun' }}</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-calendar fa-2x text-gray-300"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div
                                    class="card shadow border-start-success py-2"
                                >
                                    <div class="card-body">
                                        <div
                                            class="row align-items-center no-gutters"
                                        >
                                            <div class="col me-2">
                                                <div
                                                    class="text-uppercase text-success fw-bold text-xs mb-1"
                                                >
                                                    <span>Document{{ this.documents > 1 ? 's' : '' }}</span>
                                                </div>
                                                <div
                                                    class="text-dark fw-bold h5 mb-0"
                                                >
                                                    <span>{{ this.documents ? this.documents : 'Aucun' }}</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-dollar-sign fa-2x text-gray-300"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div
                                    class="card shadow border-start-warning py-2"
                                >
                                    <div class="card-body">
                                        <div
                                            class="row align-items-center no-gutters"
                                        >
                                            <div class="col me-2">
                                                <div
                                                    class="text-uppercase text-warning fw-bold text-xs mb-1"
                                                >
                                                    <span>Service{{ this.services > 1 ? 's' : '' }}</span>
                                                </div>
                                                <div
                                                    class="text-dark fw-bold h5 mb-0"
                                                >
                                                    <span>{{ this.services ? this.services : 'Aucun' }}</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-comments fa-2x text-gray-300"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div
                                    class="card shadow border-start-warning py-2"
                                >
                                    <div class="card-body">
                                        <div
                                            class="row align-items-center no-gutters"
                                        >
                                            <div class="col me-2">
                                                <div
                                                    class="text-uppercase text-danger fw-bold text-xs mb-1"
                                                >
                                                    <span>Agent{{ this.users > 1 ? 's' : '' }}</span>
                                                </div>
                                                <div
                                                    class="text-dark fw-bold h5 mb-0"
                                                >
                                                    <span>{{ this.users ? this.users : 'Aucun' }}</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-comments fa-2x text-gray-300"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="user.role">
                            <div class="mb-4">
                                <h3 class="text-dark mb-0">Archiving</h3>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-lg-4 mb-4">
                                            <div
                                                class="card text-white bg-primary shadow"
                                            >
                                                <div class="card-body">
                                                    <p class="m-0">Shelf{{ this.etageres > 1 ? 's' : '' }}</p>
                                                    <p
                                                        class="text-white-50 small m-0"
                                                    >
                                                        {{ this.etageres ? this.etageres : 'Aucun' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div
                                                class="card text-white bg-success shadow"
                                            >
                                                <div class="card-body">
                                                    <p class="m-0">Workbook{{ this.etageres_classeurs > 1 ? 's' : '' }}</p>
                                                    <p
                                                        class="text-white-50 small m-0"
                                                    >
                                                        {{ this.etageres_classeurs ? this.etageres_classeurs : "Aucun" }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <div
                                                class="card text-white bg-info shadow"
                                            >
                                                <div class="card-body">
                                                    <p class="m-0">Document{{ this.etageres_documents > 1 ? 's' : ''}}</p>
                                                    <p
                                                        class="text-white-50 small m-0"
                                                    >
                                                        {{ this.etageres_documents ? this.etageres_documents : "Aucun" }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h3 class="text-dark mb-0">Services</h3>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-lg-4 mb-4">
                                        <div
                                            class="card text-white bg-warning shadow"
                                        >
                                            <div class="card-body">
                                                <p class="m-0">Service{{ this.services > 1 ? 's' : '' }}</p>
                                                <p
                                                    class="text-white-50 small m-0"
                                                >
                                                    {{ this.services ? this.services : 'Aucun' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        <div
                                            class="card text-white bg-danger shadow"
                                        >
                                            <div class="card-body">
                                                <p class="m-0">Workbook{{ this.classeurs_services > 1 ? 's' : '' }}</p>
                                                <p
                                                    class="text-white-50 small m-0"
                                                >
                                                    {{ this.classeurs_services ? this.classeurs_services : 'Aucun' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        <div
                                            class="card text-white bg-secondary shadow"
                                        >
                                            <div class="card-body">
                                                <p class="m-0">Document{{ this.documents_services > 1 ? 's' : '' }}</p>
                                                <p
                                                    class="text-white-50 small m-0"
                                                >
                                                    {{ this.documents_services ? this.documents_services : "Aucun" }}
                                                </p>
                                            </div>
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
    </body>
    <OffCanvas :user="user" />
</template>
