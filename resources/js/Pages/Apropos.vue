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
    props: ['user'],
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
                                        src="/assets/img/avatars/avatar5.jpeg"
                                        width="100%"
                                        height="100%"
                                    />
                                </div>
                            </div>
                            <div class="col-12 col-sm-10 col-md-8">
                                <div class="text-center">
                                    <h3 class="mb-3">Heading</h3>
                                    <span>Text</span>
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
