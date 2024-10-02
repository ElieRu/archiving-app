<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
import DocumentComponent from "./Components/document-component.vue";
import Pagination from "./Components/pagination.vue";
import PropertiesModal from "./Components/properties-modal.vue";
import UpdateModal from "./Components/update-documents.vue";
import { Link, router } from "@inertiajs/vue3";

export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
        DocumentComponent,
        Pagination,
        Link,
        PropertiesModal,
        UpdateModal,
    },
    props: ["id", "user", "classeur", "documents", "service"],
    data() {
        return {
            switchList: true,
            myDocument: {},
            myClasseur: {},
            docId: null,
            etagereName: new URLSearchParams(window.location.search).get(
                "etagere_name"
            ),
            etagereId: new URLSearchParams(window.location.search).get(
                "etagere_id"
            ),
        };
    },
    methods: {
        switchDocs(value) {
            this.switchSearch = value;
            this.switchList = value;
        },
        getDocument(document) {
            this.myDocument = document;
        },
        getDocumentId(docId) {
            this.docId = docId;
        },
    },
    mounted() {
        // console.log(this.documents);
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
                                        ><Link
                                            v-if="!etagereId"
                                            :href="
                                                service
                                                    ? `/services`
                                                    : '/documents'
                                            "
                                        >
                                            {{
                                                service
                                                    ? "Services"
                                                    : "Documents"
                                            }}
                                        </Link>
                                        <Link
                                            v-if="etagereId"
                                            href="/archivage"
                                        >
                                            Archivage
                                        </Link></span
                                    >
                                </div>
                                <div
                                    v-if="this.service"
                                    class="d-flex align-items-center"
                                >
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
                                    ><span
                                        style="font-size: 13px"
                                        class="text-capitalize"
                                        ><Link
                                            :href="`/services/${service.id}`"
                                        >
                                            {{
                                                service.nom.length < 15
                                                    ? service.nom
                                                    : service.nom.slice(0, 15) +
                                                      "..."
                                            }}
                                        </Link></span
                                    >
                                </div>
                                <div
                                    v-if="etagereId"
                                    class="d-flex align-items-center"
                                >
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
                                    ><span
                                        style="font-size: 13px"
                                        class="text-capitalize"
                                        ><Link
                                            :href="`/archivage/etageres/${etagereId}`"
                                        >
                                            {{
                                                etagereName.length < 15
                                                    ? etagereName
                                                    : etagereName.slice(0, 15) +
                                                      "..."
                                            }}
                                        </Link></span
                                    >
                                </div>
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
                                    ><span
                                        style="font-size: 13px"
                                        class="text-capitalize"
                                        >{{
                                            classeur.nom.length < 15
                                                ? classeur.nom
                                                : classeur.nom.slice(0, 15) +
                                                  "..."
                                        }}
                                    </span>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-sm-6 d-flex">
                                    <label
                                        ><input
                                            class="form form-control"
                                            placeholder="Recherche"
                                    /></label>
                                </div>
                                <div
                                    class="col-sm-6 d-flex justify-content-end align-items-center"
                                >
                                    <MyButtons
                                        @switch-list="switchDocs"
                                        :create_classeur="true"
                                        :service_id="service ? service.id : ''"
                                        :classeur_id="this.classeur.id"
                                        :hideDocBtn="true"
                                        :etagere_id="this.etagereId"
                                    />
                                </div>
                            </div>
                            <div class="row gy-3" v-if="switchList">
                                <DocumentComdocumennent
                                    :documents="this.documents"
                                    @get-document="getDocument"
                                    @get-document-id="getDocumentId"
                                    render_page="services"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <Footer />
            </div>
            <TopPage />
        </div>
        <UpdateModal :data="this.myDocument" />
        <PropertiesModal :data="this.myDocument" />
    </body>
</template>
