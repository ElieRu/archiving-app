<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: ["user"],
};
</script>

<template>
    <nav
        class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light"
    >
        <div class="container-fluid">
            <div>
                <Link
                    class="navbar-brand link-primary d-flex justify-content-center align-items-center sidebar-brand m-0 d-sm-none"
                    href="/"
                >
                    <div class="sidebar-brand-icon rotate-n-15">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 -64 640 640"
                            width="1em"
                            height="1em"
                            fill="currentColor"
                        >
                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"
                            ></path>
                        </svg>
                    </div>
                </Link>
            </div>
            <div class="d-flex justify-content-center">
                <div
                    class="d-flex justify-content-center align-items-center"
                    style="width: 50px"
                >
                    <button
                        class="d-sm-none"
                        data-bs-target="#offcanvas-menu"
                        data-bs-toggle="offcanvas"
                        style="padding: 0; height: 30px; "
                    >
                        <svg
                            style="font-size: 22px"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="-32 0 512 512"
                            width="1em"
                            height="1em"
                            fill="currentColor"
                        >
                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M448 64c0-17.7-14.3-32-32-32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32zm0 256c0-17.7-14.3-32-32-32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32zM0 192c0 17.7 14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H32c-17.7 0-32 14.3-32 32zM448 448c0-17.7-14.3-32-32-32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32z"
                            ></path>
                        </svg>
                    </button>
                </div>
                <div>
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <li class="nav-item dropdown d-sm-none no-arrow">
                            <a
                                class="dropdown-toggle nav-link d-none"
                                aria-expanded="false"
                                data-bs-toggle="dropdown"
                                href="#"
                                ><i class="fas fa-search"></i
                            ></a>
                            <div
                                class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                aria-labelledby="searchDropdown"
                            >
                                <form class="me-auto navbar-search w-100">
                                    <div class="input-group">
                                        <input
                                            class="bg-light form-control border-0 small"
                                            type="text"
                                            placeholder="Search for ..."
                                        />
                                        <div class="input-group-append">
                                            <button
                                                class="btn btn-primary py-0"
                                                type="button"
                                            >
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow">
                                <a
                                    class="dropdown-toggle nav-link"
                                    aria-expanded="false"
                                    data-bs-toggle="dropdown"
                                    href="#"
                                    ><div class="d-flex flex-column text-right">
                                        <span
                                            class="d-none d-lg-inline me-2 text-gray-600 text-capitalize small"
                                            >{{ user.name }}
                                            {{ user.postname }}</span
                                        >
                                        <span
                                            class="d-none d-lg-inline text-capitalize"
                                            style="
                                                font-size: 12px;
                                                margin-top: -5px;
                                                margin-right: 10px;
                                            "
                                            >{{
                                                user.role === "admin"
                                                    ? "administrateur"
                                                    : user.poste
                                            }}</span
                                        >
                                    </div>
                                    <img
                                        class="border rounded-circle img-profile"
                                        :src="'/storage' + user.image"
                                /></a>
                                <div
                                    class="dropdown-menu shadow dropdown-menu-end animated--grow-in"
                                >
                                    <a class="dropdown-item" href="../profile"
                                        ><i
                                            class="fas fa-user fa-sm fa-fw me-2 text-gray-400"
                                        ></i
                                        > Profile</a
                                    >
                                    <div class="dropdown-divider"></div>
                                    <Link
                                        class="dropdown-item"
                                        href="/logout"
                                        method="post"
                                        as="button"
                                        style="cursor: pointer"
                                        ><i
                                            class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"
                                        ></i
                                        > Déconnexion</Link
                                    >
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>
