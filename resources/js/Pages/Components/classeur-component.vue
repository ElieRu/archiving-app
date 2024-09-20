<script>
import { Link, useForm } from "@inertiajs/vue3";
export default {
    props: ["classeurs", "table", "service_id", "etagere_id"],
    emits: ["get-classeur"],
    data() {
        return {
            datas: useForm({
                id: null,
                table: null,
                service_id: null,
            }),
        };
    },
    components: {
        Link,
    },
    computed: {
        get_classeurs() {
            return this.classeurs;
        },
    },
    mounted() {
        // alert(this.service_id)
    },
    methods: {
        deleteClasseur(id) {
            this.datas.id = id;
            this.datas.table = this.table;
            this.datas.service_id = this.service_id;

            this.datas.delete(`/classeurs`, {
                onSuccess: (res) => {
                    // this.$inertia.replace(`/${this.table}`, {
                    // /${this.service_id ? this.service_id : ''
                    this.$inertia.replace(
                        `/${this.table}/${
                            this.service_id ? this.service_id : null
                        }`,
                        {
                            preserveState: true,
                            preserveScroll: true,
                        }
                    );
                },
            });
        },
    },
};
</script>

<template>
    <div
        v-for="(classeur, index) in get_classeurs"
        class="col-sm-4 col-lg-3 col-xl-2"
        :key="index"
    >
        <div class="border rounded p-2">
            <div
                class="d-flex justify-content-center"
                style="position: relative"
            >
                <Link
                    :href="`classeurs/${classeur.id}`"
                    method="get"
                    :data="{ service_id: this.service_id }"
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
                </Link>
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
                            <path
                                d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"
                            ></path>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <a
                            class="dropdown-item"
                            style="cursor: pointer"
                            data-bs-target="#update-modal-classeur"
                            data-bs-toggle="modal"
                            @click="$emit('get-classeur', classeur)"
                            >Modifier</a
                        ><a
                            class="dropdown-item"
                            style="cursor: pointer"
                            @click.prevent="deleteClasseur(classeur.id)"
                            >Supprimer</a
                        ><a
                            class="dropdown-item"
                            style="cursor: pointer"
                            data-bs-target="#properties-modal-classeur"
                            data-bs-toggle="modal"
                            @click="$emit('get-classeur', classeur)"
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
</template>
