<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
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
                            class="d-flex justify-content-between align-items-center mb-4"
                        >
                            <h3 class="text-dark mb-0">Dashboard</h3>
                            <a
                                class="btn btn-primary btn-sm d-flex align-items-center"
                                role="button"
                                href="#"
                                ><i
                                    class="fas fa-download fa-sm text-white-50"
                                ></i
                                ><span
                                    class="d-none d-md-block"
                                    style="margin-left: 5px"
                                    >Générer un rapport</span
                                ></a
                            >
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
                                                    <span
                                                        >Earnings
                                                        (monthly)</span
                                                    >
                                                </div>
                                                <div
                                                    class="text-dark fw-bold h5 mb-0"
                                                >
                                                    <span>$40,000</span>
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
                                                    <span
                                                        >Earnings (annual)</span
                                                    >
                                                </div>
                                                <div
                                                    class="text-dark fw-bold h5 mb-0"
                                                >
                                                    <span>$215,000</span>
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
                                <div class="card shadow border-start-info py-2">
                                    <div class="card-body">
                                        <div
                                            class="row align-items-center no-gutters"
                                        >
                                            <div class="col me-2">
                                                <div
                                                    class="text-uppercase text-info fw-bold text-xs mb-1"
                                                >
                                                    <span>Tasks</span>
                                                </div>
                                                <div
                                                    class="row g-0 align-items-center"
                                                >
                                                    <div class="col-auto">
                                                        <div
                                                            class="text-dark fw-bold h5 mb-0 me-3"
                                                        >
                                                            <span>50%</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div
                                                            class="progress progress-sm"
                                                        >
                                                            <div
                                                                class="progress-bar bg-info"
                                                                aria-valuenow="50"
                                                                aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="
                                                                    width: 50%;
                                                                "
                                                            >
                                                                <span
                                                                    class="visually-hidden"
                                                                    >50%</span
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-clipboard-list fa-2x text-gray-300"
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
                                                    <span
                                                        >Pending Requests</span
                                                    >
                                                </div>
                                                <div
                                                    class="text-dark fw-bold h5 mb-0"
                                                >
                                                    <span>18</span>
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
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div
                                            class="card text-white bg-primary shadow"
                                        >
                                            <div class="card-body">
                                                <p class="m-0">Primary</p>
                                                <p
                                                    class="text-white-50 small m-0"
                                                >
                                                    #4e73df
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div
                                            class="card text-white bg-success shadow"
                                        >
                                            <div class="card-body">
                                                <p class="m-0">Success</p>
                                                <p
                                                    class="text-white-50 small m-0"
                                                >
                                                    #1cc88a
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div
                                            class="card text-white bg-info shadow"
                                        >
                                            <div class="card-body">
                                                <p class="m-0">Info</p>
                                                <p
                                                    class="text-white-50 small m-0"
                                                >
                                                    #36b9cc
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div
                                            class="card text-white bg-warning shadow"
                                        >
                                            <div class="card-body">
                                                <p class="m-0">Warning</p>
                                                <p
                                                    class="text-white-50 small m-0"
                                                >
                                                    #f6c23e
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div
                                            class="card text-white bg-danger shadow"
                                        >
                                            <div class="card-body">
                                                <p class="m-0">Danger</p>
                                                <p
                                                    class="text-white-50 small m-0"
                                                >
                                                    #e74a3b
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div
                                            class="card text-white bg-secondary shadow"
                                        >
                                            <div class="card-body">
                                                <p class="m-0">Secondary</p>
                                                <p
                                                    class="text-white-50 small m-0"
                                                >
                                                    #858796
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
</template>
