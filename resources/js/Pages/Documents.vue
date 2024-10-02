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
import ShareModal from "./Components/share-modal.vue";
import Pagination from "./Components/pagination.vue";
import propertiesModalClasseur from "./Components/properties-modal-classeur.vue";
import ClasseurComponent from "./Components/classeur-component.vue";
import DocumentComponent from "./Components/document-component.vue";

const etagere_id = 1

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
        Pagination,
        ClasseurComponent,
        DocumentComponent,
    },
    props: ["user", "users", "documents", "services", "classeurs"],
    data() {
        return {
            myDocument: {},
            myClasseur: {},
            docId: "",
            switchList: true,
            switchSearch: true,
            checkedClasseurs: [],
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
        getDocument(document) {
            this.myDocument = document;
        },
        getDocumentId(docId) {
            this.docId = docId;
        },
        download(docId) {
            alert(docId);
        },
        getClasseur(classeur) {
            this.myClasseur = classeur;
        },
        // multiDelete() {
        //     this.$inertia.post(
        //         "/delete-more",
        //         {
        //             datas: this.checkedClasseurs,
        //         },
        //         {
        //             onSuccess: () => {
        //                 this.$inertia.replace("/documents", {
        //                     preserveScroll: true,
        //                     preserveState: true,
        //                 });
        //             },
        //         }
        //     );
        // },
    },
    mounted() {},
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
                                    ><Link href="/documents">
                                        Documents
                                    </Link></span
                                >
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
                                    table="documents"
                                />
                            </div>
                            <div
                                class="col-sm-6 d-flex justify-content-end align-items-center"
                            >
                                <MyButtons @switch-list="switchDocs" />
                                
                            </div>
                        </div>
                        <div class="row gy-3" v-if="switchList">
                            <ClasseurComponent
                                :classeurs="this.classeurs.data"
                                @get-classeur="getClasseur"
                                table="documents"
                            />
                            <Pagination
                                :datas="this.classeurs"
                                v-if="this.classeurs.data.length >= 1"
                            />
                        </div>
                        <div class="row gy-3" v-if="!switchList">
                            <DocumentComponent
                                :documents="this.documents"
                                @get-document="getDocument"
                                @get-document-id="getDocumentId"
                                render_page="documents"
                            />
                            <Pagination
                                :datas="this.documents"
                                v-if="this.documents.data.length >= 1"
                            />
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
        <UpdateModalClasseur :data="this.myClasseur" table="documents" />
    </body>
</template>
