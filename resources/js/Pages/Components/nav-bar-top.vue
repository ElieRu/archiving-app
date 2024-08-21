<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: ['user']
};
</script>

<template>
    <nav
        class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light"
    >
        <div class="container-fluid">
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
                                >{{ user.name }} {{ user.postname }}</span
                            >
                            <span class="d-none d-lg-inline text-capitalize" style="font-size: 12px; margin-top: -5px; margin-right: 10px;">{{ user.role === 'admin' ? 'administrateur' : user.poste }}</span>
                            </div><img
                                class="border rounded-circle img-profile"
                                :src="'/storage'+user.image"
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
    </nav>
</template>
