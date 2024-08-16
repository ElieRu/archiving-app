<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import TopPage from "./Components/top-page.vue";
export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
    },
};
</script>

<template>
    <body id="page-top">
        <div id="wrapper">
            <NavBar />
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <NavBarTop />
                    <div class="container-fluid">
                        <h3 class="text-dark mb-4">Administrateur</h3>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-body shadow">
                                        <div class="d-flex justify-content-center">
                                            <img
                                                class="rounded-circle mb-3 mt-4"
                                                src="/assets/img/dogs/image2.jpeg"
                                                width="160"
                                                height="160"
                                            />
                                        </div>
                                        <div class="d-flex justify-content-center mb-3">
                                            <label
                                                class="form-label"
                                                for="img-profile"
                                                ><a
                                                    class="btn btn-primary btn-sm"
                                                    role="button"
                                                    >Changer l&#39;image</a
                                                ></label
                                            ><input
                                                id="img-profile"
                                                class="d-none"
                                                type="file"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary fw-bold m-0">
                                            Mot de passe
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="mb-2 mt-2">
                                                <label class="form-label"
                                                    >Nouveau</label
                                                ><input
                                                    class="form-control"
                                                    type="password"
                                                    placeholder="Nouveau"
                                                />
                                            </div>
                                            <div class="mb-2 mt-2">
                                                <label class="form-label"
                                                    >Confirmation</label
                                                ><input
                                                    class="form-control"
                                                    type="password"
                                                    placeholder="Confirmation"
                                                />
                                            </div>
                                            <button
                                                class="btn btn-primary"
                                                type="button"
                                            >
                                                Mettre à jour
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row mb-3 d-none">
                                    <div class="col">
                                        <div
                                            class="card text-white bg-primary shadow"
                                        >
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col">
                                                        <p class="m-0">
                                                            Peformance
                                                        </p>
                                                        <p class="m-0">
                                                            <strong
                                                                >65.2%</strong
                                                            >
                                                        </p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i
                                                            class="fas fa-rocket fa-2x"
                                                        ></i>
                                                    </div>
                                                </div>
                                                <p
                                                    class="text-white-50 small m-0"
                                                >
                                                    <i
                                                        class="fas fa-arrow-up"
                                                    ></i
                                                    > 5% since last month
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div
                                            class="card text-white bg-success shadow"
                                        >
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col">
                                                        <p class="m-0">
                                                            Peformance
                                                        </p>
                                                        <p class="m-0">
                                                            <strong
                                                                >65.2%</strong
                                                            >
                                                        </p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i
                                                            class="fas fa-rocket fa-2x"
                                                        ></i>
                                                    </div>
                                                </div>
                                                <p
                                                    class="text-white-50 small m-0"
                                                >
                                                    <i
                                                        class="fas fa-arrow-up"
                                                    ></i
                                                    > 5% since last month
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p
                                                    class="text-primary m-0 fw-bold"
                                                >
                                                    Informations
                                                </p>
                                            </div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >Nom</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Nom"
                                                                />
                                                            </div>
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >Postnom</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Postnom"
                                                                />
                                                            </div>
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >Matricule</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Matricule"
                                                                />
                                                            </div>
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >Rôle</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="text"
                                                                    value="administrateur"
                                                                    disabled
                                                                />
                                                            </div>
                                                            <div
                                                                class="mt-2 mb-2"
                                                            >
                                                                <label
                                                                    class="form-label"
                                                                    >Email</label
                                                                ><input
                                                                    class="form-control"
                                                                    type="email"
                                                                    placeholder="Addresse mail"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button
                                                            class="btn btn-primary"
                                                            type="submit"
                                                        >
                                                            Personnalisez
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
    </body>
</template>
