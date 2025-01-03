<script>
import { Link, useForm } from "@inertiajs/vue3";

export default {
    props: [
        "classeur",
        "actual_page",
        "documents",
        "etagere",
        "etageres",
        "service",
        "role",
    ],
    emits: ["get-document", "get-document-id"],
    components: {
        Link,
    },
    data() {
        return {
            datas: useForm({
                id: null,
                actual_page: null,
                classeur_id: null,
                etagere_id: null,
                service_id: null,
            }),
            route: "",
        };
    },
    computed: {
        get_documents() {
            return this.documents;
        },
    },
    mounted() {
        if (this.actual_page === "documents") {
            this.route = `/documents/classeurs/${this.classeur.id}`;
        } else if (this.actual_page === "etageres") {
            this.route = `/etageres/${this.etagere.id}/classeurs/${this.classeur.id}`;
        } else {
            // Dedicate to the *services case
            this.route = `/services/${this.service.id}/classeurs/${this.classeur_id}`;
        }
    },
    methods: {
        deleteDocument(id) {
            this.datas.id = id;
            // this.datas.actual_page = this.actual_page;
            this.datas.classeur_id = this.classeur ? this.classeur.id : null;
            this.datas.etagere_id = this.etagere ? this.etagere.id : null;
            this.datas.service_id = this.service ? this.service.id : null;
            this.datas.delete(this.route);
        },
        download(id) {
            alert(id);
        },
        archiving() {
            alert(id);
        },
    },
};
</script>

<template>
    <div
        v-for="(document, index) in get_documents.data"
        :key="index"
        class="col-sm-4 col-lg-3 col-xl-2"
    >
        <div class="border rounded p-2" style="overflow: visible">
            <div
                class="d-flex justify-content-center"
                style="position: relative"
            >
                <img
                    v-if="
                        document.extension === 'docx' ||
                        document.extension === 'pdf' ||
                        document.extension === 'pptx' ||
                        document.extension === 'xlsx'
                    "
                    style="
                        width: 90px;
                        padding-top: 20px;
                        padding-bottom: 7px;
                        height: 100px;
                    "
                    :src="`/icons/${document.extension}.png`"
                />

                <img
                    v-if="
                        document.extension !== 'docx' &&
                        document.extension !== 'pdf' &&
                        document.extension !== 'pptx' &&
                        document.extension !== 'xlsx'
                    "
                    style="
                        width: 90px;
                        padding-top: 20px;
                        padding-bottom: 7px;
                        height: 100px;
                    "
                    :src="`/icons/unknown.png`"
                />

                <div
                    class="dropdown"
                    style="position: absolute; top: 0px; right: 0px"
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
                            v-if="
                                document.extension === 'docx' ||
                                document.extension === 'pdf' ||
                                document.extension === 'pptx' ||
                                document.extension === 'xlsx'
                            "
                            class="dropdown-item"
                            style="cursor: pointer"
                            data-bs-target="#update-modal"
                            data-bs-toggle="modal"
                            @click="$emit('get-document', document)"
                            >Modify</a
                        ><a
                            v-if="
                                document.extension === 'docx' ||
                                document.extension === 'pdf' ||
                                document.extension === 'pptx' ||
                                (document.extension === 'xlsx' &&
                                    actual_page !== 'etageres')
                            "
                            class="dropdown-item"
                            style="cursor: pointer"
                            data-bs-target="#share-modal"
                            data-bs-toggle="modal"
                            @click="$emit('get-document-id', document.id)"
                            >Share</a
                        ><a
                            v-if="
                                document.extension === 'docx' ||
                                document.extension === 'pdf' ||
                                document.extension === 'pptx' ||
                                (document.extension === 'xlsx' && etageres)
                            "
                            class="dropdown-item"
                            style="cursor: pointer"
                            data-bs-target="#archiving-modal"
                            data-bs-toggle="modal"
                            @click="$emit('get-document-id', document.id)"
                            >Archived</a
                        >
                        <!-- <a
                            class="dropdown-item"
                            style="cursor: pointer"
                            @click="download(document.id)"
                            >Télécharger</a
                        > -->
                        <a
                            v-if="
                                actual_page !== 'etageres' ||
                                role == 'archiviste' ||
                                role == 'admin'
                            "
                            class="dropdown-item"
                            style="cursor: pointer"
                            @click="deleteDocument(document.id)"
                            >Delete</a
                        ><a
                            class="dropdown-item"
                            style="cursor: pointer"
                            data-bs-target="#properties-modal"
                            data-bs-toggle="modal"
                            @click="$emit('get-document', document)"
                            >Properties</a
                        >
                    </div>
                </div>
            </div>
            <span style="font-size: 13px">{{
                document.titre.length < 15
                    ? document.titre
                    : document.titre.slice(0, 15) + "..."
            }}</span>
        </div>
    </div>
</template>
