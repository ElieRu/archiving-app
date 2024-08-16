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
                        <div
                            class="d-flex justify-content-between align-items-center"
                        >
                            <h3 class="text-dark mb-4">Créer un agent</h3>
                            <a
                                class="btn btn-primary btn-sm"
                                role="button"
                                href="/agents"
                                >Retour</a
                            >
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">
                                    Employee Info
                                </p>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
                                                    >Nom</label
                                                ><input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="Nom"
                                                />
                                            </div>
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
                                                    >Postnom</label
                                                ><input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="Postnom"
                                                />
                                            </div>
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
                                                    >Sexe</label
                                                ><select class="form-select">
                                                    <optgroup
                                                        label="Selectionnez"
                                                    >
                                                        <option
                                                            value="homme"
                                                            selected
                                                        >
                                                            Homme
                                                        </option>
                                                        <option value="Femme">
                                                            Femme
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
                                                    >Matricule</label
                                                ><input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="Matricule"
                                                />
                                            </div>
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
                                                    >Poste occupé</label
                                                ><select class="form-select">
                                                    <optgroup
                                                        label="This is a group"
                                                    >
                                                        <option
                                                            value="12"
                                                            selected
                                                        >
                                                            This is item 1
                                                        </option>
                                                        <option value="13">
                                                            This is item 2
                                                        </option>
                                                        <option value="14">
                                                            This is item 3
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="mt-2 mb-2">
                                                <label class="form-label"
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
                                            Créer un agent
                                        </button>
                                    </div>
                                </form>
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
