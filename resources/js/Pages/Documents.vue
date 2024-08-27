<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
import UpdateModal from "./Components/update-documents.vue";
import UpdateModalClasseur from "./Components/update-documents-classeur.vue";
import { Link, router } from "@inertiajs/vue3";
import PropertiesModal from "./Components/properties-modal.vue";
import propertiesModalClasseur from "./Components/properties-modal-classeur.vue";
import ShareModal from "./Components/share-modal.vue";
import PaginationAgents from "./Components/pagination-agents.vue";

export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
        Link,
        UpdateModal,
        UpdateModalClasseur,
        PropertiesModal,
        propertiesModalClasseur,
        ShareModal,
        PaginationAgents
    },
    props: ["user", "users", "documents", "services", "classeurs"],
    data() {
        return {
            myDocument: {},
            myClasseur: {},
            docId: "",
            switchList: true,
            switchSearch: true,
        };
    },
    methods: {
        switchDocs(value) {
            this.switchSearch = value;
            this.switchList = value;
        },
        sortList(value) {
            alert(value);
        },
        myLoad() {
            router.replace("/documents");
        },
        updateModal(document) {
            this.myDocument = document;
        },
        shareModal(docId) {
            this.docId = docId;
        },
        closeModal() {
            this.$refs.updateDoc.click();
        },
        download(docId) {
            alert(docId);
        },
        getClasseur(classeur) {
            this.myClasseur = classeur;
        },
    },
    mounted() {
        // console.log(this.classeurs.total);
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
                                <h3 class="text-dark mb-1">Documents</h3>
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
                                />
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <MyButtons @switch-list="switchDocs" />
                            </div>
                        </div>
                        <div class="row gy-3" v-if="switchList">
                            <div
                                v-for="(classeur, index) in this.classeurs.data"
                                class="col-sm-4 col-lg-3 col-xl-2"
                            >
                                <div class="border rounded p-2">
                                    <div
                                        class="d-flex justify-content-center"
                                        style="position: relative"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512"
                                            width="1em"
                                            height="1em"
                                            fill="currentColor"
                                            style="
                                                font-size: 100px;
                                                padding-top: 20px;
                                                padding-bottom: 7px;
                                            "
                                        >
                                            <path
                                                d="M251.7 127.6l0 0c10.5 10.5 24.7 16.4 39.6 16.4H448c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H197.5c4.2 0 8.3 1.7 11.3 4.7l33.9-33.9L208.8 84.7l42.9 42.9zM48 240H464V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V240zM285.7 93.7L242.7 50.7c-12-12-28.3-18.7-45.3-18.7H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H291.3c-2.1 0-4.2-.8-5.7-2.3z"
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
                                                    <path
                                                        d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"
                                                    ></path>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a
                                                    class="dropdown-item"
                                                    style="cursor: pointer"
                                                    >Ouvrir</a
                                                ><a
                                                    class="dropdown-item"
                                                    style="cursor: pointer"
                                                    data-bs-target="#update-modal-classeur"
                                                    data-bs-toggle="modal"
                                                    @click="
                                                        getClasseur(classeur)
                                                    "
                                                    >Modifier</a
                                                ><Link
                                                    class="dropdown-item"
                                                    style="cursor: pointer"
                                                    href="/classeurs"
                                                    method="delete"
                                                    as="button"
                                                    :data="{ id: classeur.id }"
                                                    >Supprimer</Link
                                                ><a
                                                    class="dropdown-item"
                                                    style="cursor: pointer"
                                                    data-bs-target="#properties-modal-classeur"
                                                    data-bs-toggle="modal"
                                                    @click="
                                                        getClasseur(classeur)
                                                    "
                                                    >Propriètés</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <span style="font-size: 13px">{{
                                        classeur.nom.length < 15
                                            ? classeur.nom
                                            : classeur.nom.slice(0, 15) + "..."
                                    }}</span>
                                </div>
                            </div>
                            <PaginationAgents :datas="this.classeurs" />
                        </div>
                        <div class="row gy-3" v-if="!switchList">
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
                            <PaginationAgents :datas="this.documents" />
                        </div>
                    </div>
                </div>
                <Footer />
            </div>
            <TopPage />
        </div>
        <UpdateModal :data="this.myDocument" />
        <PropertiesModal :data="this.myDocument" />
        <ShareModal
            :users="users"
            :services="services"
            :classeurs="this.classeurs.data"
            :docId="docId"
        />
        <propertiesModalClasseur :data="this.myClasseur" />
        <UpdateModalClasseur :data="this.myClasseur" />
    </body>
</template>
