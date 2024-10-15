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
import UpdateServiceModal from "./Components/update-service-modal.vue";
import OffCanvas from "./Components/off-canvas.vue";
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
        UpdateServiceModal,
        Link,
        OffCanvas
    },
    props: ["user", "services"],
    data() {
        return {
            search: "",
            service: {},
        };
    },
    computed: {
        filteredDatas() {
            return Object.values(this.services).filter((service) =>
                service.nom.toLowerCase().includes(this.search.toLowerCase())
            );
        },
    },
    methods: {
        getService(service) {
            this.service = service;
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
                        <div class="row gy-4 flex-column align-items-center">
                            <div>
                                <div class="d-flex align-items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 -32 576 576"
                                        width="1em"
                                        height="1em"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185V64c0-17.7-14.3-32-32-32H448c-17.7 0-32 14.3-32 32v36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32v69.7c-.1 .9-.1 1.8-.1 2.8V472c0 22.1 17.9 40 40 40h16c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2H160h24c22.1 0 40-17.9 40-40V448 384c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v64 24c0 22.1 17.9 40 40 40h24 32.5c1.4 0 2.8 0 4.2-.1c1.1 .1 2.2 .1 3.3 .1h16c22.1 0 40-17.9 40-40V455.8c.3-2.6 .5-5.3 .5-8.1l-.7-160.2h32z"
                                        ></path>
                                    </svg>
                                    <div class="d-flex align-items-center">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="-96 0 512 512"
                                            width="1em"
                                            height="1em"
                                            fill="currentColor"
                                            style="
                                                margin-right: 10px;
                                                margin-left: 10px;
                                            "
                                        >
                                            <path
                                                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"
                                            ></path></svg
                                        ><span style="font-size: 13px"
                                            ><Link href="/services">
                                                Services
                                            </Link></span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3 ">
                            <div class="col-md-6 d-flex justify-content-start">
                                <SearchBar route="/services" />
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <button
                                    class="btn btn-primary d-flex align-items-center btn-sm"
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
                                    <span style="margin-left: 6px;">Création</span>
                                </button>
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
                                                <div
                                                    class="dropdown"
                                                    v-if="
                                                        this.user.role ==
                                                        'admin'
                                                    "
                                                >
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
                                                            style="
                                                                cursor: pointer;
                                                            "
                                                            data-bs-target="#update-service-modal"
                                                            data-bs-toggle="modal"
                                                            @click.prevent="
                                                                getService(
                                                                    service
                                                                )
                                                            "
                                                            >Modifier</a
                                                        ><a
                                                            class="dropdown-item"
                                                            style="
                                                                cursor: pointer;
                                                            "
                                                            data-bs-target="#delete-service-modal"
                                                            data-bs-toggle="modal"
                                                            @click.prevent="
                                                                getService(
                                                                    service
                                                                )
                                                            "
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
        <DeleteServiceModal :id="this.service.id" />
        <AddServiceModal />
        <UpdateServiceModal :service="this.service" />
    </body>
    <OffCanvas :user="user" />
</template>
