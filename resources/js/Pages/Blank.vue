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
            TopPage
        }
    }
</script>


<template>
    <body id="page-top">
        <div id="wrapper">
            <NavBar />
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <NavBarTop/>
                    <div class="container-fluid">
                        <div
                            class="d-flex justify-content-between align-items-center"
                        >
                            <div class="d-flex">
                                <h3 class="text-dark mb-1">Blank</h3>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-sm-6 d-flex">
                                <SearchBar/>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <MyButtons/>
                            </div>
                        </div>
                        <div class="row gy-3">
                            <!-- content -->
                        </div>
                    </div>
                </div>
                <Footer/>
            </div>
            <TopPage/>
        </div>
    </body>
</template>


