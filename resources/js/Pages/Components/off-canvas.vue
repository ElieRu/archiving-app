<script>
import { Link, router } from "@inertiajs/vue3";

export default {
    components: {
        Link, 
    },
    methods: {
        goTo(route) {
            this.$refs.closeBtn.click();
            this.$inertia.get(route)
        }
    },
    props: ["user"],
};
</script>

<template>
    <div
        id="offcanvas-menu"
        class="offcanvas offcanvas-start bg-body d-sm-block"
        tabindex="-1"
    >
        <div class="offcanvas-header">
            <Link
                class="link-body-emphasis d-flex align-items-center me-md-auto mb-3 mb-md-0 text-decoration-none"
                href="/"
                ><svg
                    class="mr-1"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 -64 640 640"
                    width="1em"
                    height="1em"
                    fill="currentColor"
                >
                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"
                    ></path></svg
                ><span class="fs-5">Arch-Docs</span></Link
            ><button
                class="btn-close"
                type="button"
                ref="closeBtn"
                aria-label="Close"
                data-bs-dismiss="offcanvas"
            ></button>
        </div>
        <div
            class="offcanvas-body d-flex flex-column justify-content-between pt-0"
        >
            <div>
                <hr class="mt-0" />
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a
                            class="nav-link link-body-emphasis d-flex align-items-center"
                            @click.prevent="goTo('/')"
                            aria-current="page"
                            style="cursor: pointer;"
                            ><svg
                                class="me-2"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="-32 0 512 512"
                                width="1em"
                                height="1em"
                                fill="currentColor"
                            >
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z"
                                ></path>
                            </svg>
                            Dashboard</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link link-body-emphasis d-flex align-items-center"
                            style="cursor: pointer;"
                            @click.prevent="goTo('/documents')"
                            ><svg
                                class="me-2"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="-64 0 512 512"
                                width="1em"
                                height="1em"
                                fill="currentColor"
                            >
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"
                                ></path>
                            </svg>
                            Documents</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link link-body-emphasis d-flex align-items-center"
                            @click.prevent="goTo('/etageres')"
                            style="cursor: pointer;"
                            ><svg
                                class="me-2"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 -32 576 576"
                                width="1em"
                                height="1em"
                                fill="currentColor"
                            >
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M88.7 223.8L0 375.8V96C0 60.7 28.7 32 64 32H181.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 28.3 18.7 45.3 18.7H416c35.3 0 64 28.7 64 64v32H144c-22.8 0-43.8 12.1-55.3 31.8zm27.6 16.1C122.1 230 132.6 224 144 224H544c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-112 192C453.9 474 443.4 480 432 480H32c-11.5 0-22-6.1-27.7-16.1s-5.7-22.2 .1-32.1l112-192z"
                                ></path>
                            </svg>
                            Archiving</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link link-body-emphasis d-flex align-items-center"
                            style="cursor: pointer;"
                            @click.prevent="goTo('/services')"
                            ><svg
                                class="me-2"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 -64 640 640"
                                width="1em"
                                height="1em"
                                fill="currentColor"
                            >
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"
                                ></path>
                            </svg>
                            Services</a
                        >
                    </li>
                    <li class="nav-item" v-if="user.role">
                        <a
                            class="nav-link link-body-emphasis d-flex align-items-center"
                            style="cursor: pointer;"
                            @click.prevent="goTo('/agents')"
                            ><svg
                                class="me-2"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                                width="1em"
                                height="1em"
                                fill="currentColor"
                            >
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152V512l-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427V224c0-17.7 14.3-32 32-32H62.3c63.6 0 125.6 19.6 177.7 56zm32 264V248c52.1-36.4 114.1-56 177.7-56H480c17.7 0 32 14.3 32 32V427c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z"
                                ></path>
                            </svg>
                            Agents</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link link-body-emphasis d-flex align-items-center"
                            style="cursor: pointer;"
                            @click.prevent="goTo('/apropos')"
                            ><svg
                                class="me-2"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                                width="1em"
                                height="1em"
                                fill="currentColor"
                            >
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM169.8 165.3c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"
                                ></path>
                            </svg>
                            About</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
