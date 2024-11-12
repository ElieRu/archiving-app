<script>
import NavBar from "./Components/nav-bar.vue";
import NavBarTop from "./Components/nav-bar-top.vue";
import Footer from "./Components/footer.vue";
import SearchBar from "./Components/search-bar.vue";
import MyButtons from "./Components/my-buttons.vue";
import OffCanvas from "./Components/off-canvas.vue";
import TopPage from "./Components/top-page.vue";
import { Link } from "@inertiajs/vue3";
export default {
    components: {
        NavBar,
        NavBarTop,
        SearchBar,
        Footer,
        MyButtons,
        TopPage,
        OffCanvas,
    },
    props: ["user"],
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
                            <div class="col-8 d-flex justify-content-center">
                                <div
                                    class="border rounded-circle"
                                    style="
                                        width: 150px;
                                        height: 150px;
                                        overflow: hidden;
                                    "
                                >
                                    <img
                                        src="/assets/doc/IMG_0022.jpg"
                                        width="100%"
                                        height="100%"
                                    />
                                </div>
                            </div>
                            <div class="col-12 col-sm-10 col-md-8">
                                <div class="text-center">
                                    <h3 class="mb-3">Florence Ashuza</h3>
                                    <span
                                        >La réglementation universitaire impose
                                        à tout étudiant ayant validé sa licence
                                        de rédiger un mémoire. Florence Ashuza,
                                        étudiante en dernière année de licence
                                        en Réseaux et Télécommunications, a
                                        choisi d'appliquer ces connaissances
                                        théoriques à un projet concret. Sous la
                                        supervision du Prof. Dr. Elie ZIHINDULA MUSHENGEZI et
                                        l'encadrement du CT. MUGISHO Mushegerha Youwen, elle a
                                        développé une application web innovante
                                        visant à <a href="/assets/doc/doc-florence.pdf">améliorer la durabilité et
                                        l'efficacité</a> de la gestion documentaire
                                        au sein de la REGIDESO/Bukavu. Ce
                                        travail, réalisé en 2023-2024, marque
                                        ainsi la fin de son cursus
                                        universitaire.</span
                                    >
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
    <OffCanvas :user="user" />
</template>
