<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
import UpdateEtagereModal from "./Components/update-etagere-modal.vue";
import OffCanvas from "./Components/off-canvas.vue";
import { Link, useForm } from "@inertiajs/vue3";
export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
        Link,
        UpdateEtagereModal,
        OffCanvas
    },
    props: ["user", "etageres"],
    data() {
        return {
            datas: useForm({
                number: null,
            }),
            disable: false,
            my_etagere: ''
        };
    },
    methods: {
        submit() {
            this.disable = true;
            this.datas.number =
                this.etageres.length == 0 ? 1 : this.etageres.length;
            this.datas.post(
                `/etageres`,
                {
                    onSuccess: () => {
                        this.disable = false;
                    },
                },
                {
                    preserveScroll: true,
                    preserveState: true,
                }
            );
        },
        get_etagere(etagere) {
            this.my_etagere = etagere
        }
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
                                    ><Link href="/etageres">
                                        Archiving
                                    </Link></span
                                >
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-10 d-flex">
                                <div
                                    id="dataTable_filter"
                                    class="text-md-end d-flex justify-content-end dataTables_filter"
                                >
                                    <SearchBar route="/etageres"/>
                                </div>
                            </div>
                            <div class="col-2 d-flex justify-content-end">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-primary btn-sm d-flex align-items-center"
                                        type="button"
                                        style="
                                            margin-right: 10px;
                                            height: 30.33px;
                                        "
                                        v-if="
                                            user.role === 'admin' ||
                                            user.poste === 'archiviste'
                                        "
                                        @click="submit()"
                                        :disabled="disable"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512"
                                            width="1em"
                                            height="1em"
                                            fill="currentColor"
                                        >
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M512 416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H192c20.1 0 39.1 9.5 51.2 25.6l19.2 25.6c6 8.1 15.5 12.8 25.6 12.8H448c35.3 0 64 28.7 64 64V416zM232 376c0 13.3 10.7 24 24 24s24-10.7 24-24V312h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H280V200c0-13.3-10.7-24-24-24s-24 10.7-24 24v64H168c-13.3 0-24 10.7-24 24s10.7 24 24 24h64v64z"
                                            ></path></svg
                                        ><span
                                            class="d-none d-sm-block"
                                            style="margin-left: 6px"
                                            >New Shelf</span
                                        ></button
                                    ><label
                                        class="form-label"
                                        for="file"
                                        style="margin-bottom: 0px"
                                    ></label
                                    ><input
                                        id="file"
                                        class="d-none"
                                        type="file"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row gy-2">
                            <div
                                class="col-12 col-md-6 col-xl-4"
                                v-for="(etagere, index) in this.etageres"
                                :key="index"
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
                                            >
                                                <Link
                                                    :href="`/etageres/${etagere.id}`"
                                                    class="text-capitalize"
                                                    >{{ etagere.nom }}</Link
                                                >
                                            </h4>
                                            <div>
                                                <div
                                                    class="dropdown"
                                                    v-if="
                                                        user.role === 'admin' ||
                                                        user.role ===
                                                            'archiviste'
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
                                                        <Link
                                                            class="dropdown-item"
                                                            style="cursor: pointer;"
                                                            href=""
                                                            data-bs-target="#update-etagere-modal"
                                                            data-bs-toggle="modal"
                                                            @click.prevent="get_etagere(etagere)"
                                                            >Modify</Link
                                                        ><Link
                                                            class="dropdown-item"
                                                            href="etageres-delete"
                                                            as="button"
                                                            method="get"
                                                            :data="{
                                                                id: etagere.id,
                                                            }"
                                                            >Delete</Link
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="card-text">
                                            {{
                                                etagere.description
                                                    ? etagere.description
                                                    : "Description **"
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
        <UpdateEtagereModal :etagere="this.my_etagere"/>
    </body>
    <OffCanvas :user="user" />
</template>
