<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
import Pagination from "./Components/pagination.vue";
import ClasseurComponent from "./Components/classeur-component.vue";

import { Link } from "@inertiajs/vue3";

export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
        Pagination,
        ClasseurComponent,
        Link,
    },
    props: ["user", "service", "classeurs", "documents"],
    data () {
        return {
            switchSearch: true,
        }
    },
    methods: {
        switchDocs(value) {
            this.switchSearch = value;
            this.switchList = value;
        },
        sortList(value) {
            alert(value);
        },
    },
    mounted() {
        console.log();        
    }
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
                                    <Link href="/services">Services</Link>
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
                                    class="text-body-secondary text-capitalize"
                                    style="margin: 0px; margin-bottom: 0px"
                                >
                                    {{
                                        service.nom.length < 15
                                            ? service.nom
                                            : service.nom.slice(0, 15) + "..."
                                    }}
                                </h3>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-sm-6 d-flex">
                                <SearchBar
                                    @switch-list="switchDocs"
                                    @sort-list="sortList"
                                    :switchSearch="switchSearch"
                                    :lenClas="this.classeurs.total"
                                    :lenDocs="this.documents.total"
                                    table="services"
                                    :service_id="this.service.id"
                                />
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <MyButtons
                                    @switch-list="switchDocs"
                                    :service_id="this.service.id"
                                />
                            </div>
                        </div>
                        <div class="row gy-3" v-if="!switchList">
                            <ClasseurComponent
                                :classeurs="this.classeurs.data"
                                @get-classeur="getClasseur"
                                table="services"
                                :service_id="service.id"
                            />
                            <Pagination :datas="this.classeurs" v-if="this.classeurs.data.length >= 1" />
                        </div>
                        <div class="row gy-3" v-if="switchList">
                            <div
                                v-for="(document, index) in this.documents.data"
                                :key="index"
                                class="col-sm-4 col-lg-3 col-xl-2"
                            >
                                <div
                                    class="border rounded p-2"
                                    style="overflow: visible"
                                >
                                    <div
                                        class="d-flex justify-content-center"
                                        style="position: relative"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="-64 0 512 512"
                                            width="1em"
                                            height="1em"
                                            fill="currentColor"
                                            style="
                                                font-size: 100px;
                                                padding-top: 20px;
                                                padding-bottom: 7px;
                                            "
                                        >
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"
                                            ></path>
                                        </svg>
                                        <div
                                            class="dropdown"
                                            style="
                                                position: absolute;
                                                top: 0px;
                                                right: 0px;
                                            "
                                        >
                                            <button
                                                class="btn btn-primary bg-transparent border-0"
                                                aria-expanded="false"
                                                data-bs-toggle="dropdown"
                                                type="button"
                                            >
                                                <svg
                                                    class="text-body-secondary"
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
                                                    style="cursor: pointer"
                                                    data-bs-target="#update-modal"
                                                    data-bs-toggle="modal"
                                                    @click="
                                                        updateModal(document)
                                                    "
                                                    >Modifier</a
                                                ><a
                                                    class="dropdown-item"
                                                    style="cursor: pointer"
                                                    data-bs-target="#share-modal"
                                                    data-bs-toggle="modal"
                                                    @click="
                                                        shareModal(document.id)
                                                    "
                                                    >Partager</a
                                                ><a
                                                    class="dropdown-item"
                                                    style="cursor: pointer"
                                                    @click="
                                                        download(document.id)
                                                    "
                                                    >Télécharger</a
                                                ><Link
                                                    class="dropdown-item"
                                                    style="cursor: pointer"
                                                    href="/documents"
                                                    method="delete"
                                                    as="button"
                                                    :data="{
                                                        id: document.id,
                                                    }"
                                                    >Supprimer</Link
                                                ><a
                                                    class="dropdown-item"
                                                    style="cursor: pointer"
                                                    data-bs-target="#properties-modal"
                                                    data-bs-toggle="modal"
                                                    @click="
                                                        updateModal(document)
                                                    "
                                                    >Proprietés</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <span style="font-size: 13px">{{
                                        document.titre.length < 15
                                            ? document.titre
                                            : document.titre.slice(0, 15) +
                                              "..."
                                    }}</span>
                                </div>
                            </div>
                            <Pagination :datas="this.documents"  v-if="this.documents.data.length >= 1" />
                        </div>
                    </div>
                </div>
                <Footer />
            </div>
            <TopPage />
        </div>
    </body>
</template>
