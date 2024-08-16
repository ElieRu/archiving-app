<template>
    <body class="bg-gradient-primary" style="background: white">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">
                                                Bienvenu!
                                            </h4>
                                        </div>
                                        <form class="user" method="post">
                                            <div class="mb-3">
                                                <input
                                                    id="exampleInputEmail"
                                                    class="form-control form-control-user"
                                                    type="email"
                                                    aria-describedby="emailHelp"
                                                    placeholder="Addresse mail"
                                                    name="email"
                                                />
                                            </div>
                                            <div class="mb-3">
                                                <input
                                                    id="exampleInputPassword"
                                                    class="form-control form-control-user"
                                                    type="password"
                                                    placeholder="Mot de passe"
                                                    name="password"
                                                />
                                            </div>
                                            <div class="mb-3">
                                                <div
                                                    class="custom-control custom-checkbox small"
                                                >
                                                    <div
                                                        class="form-check d-flex align-items-center"
                                                    >
                                                        <input
                                                            id="formCheck-1"
                                                            class="form-check-input custom-control-input"
                                                            type="checkbox"
                                                        /><label
                                                            class="form-check-label custom-control-label"
                                                            for="formCheck-1"
                                                            style="
                                                                margin-left: 8px;
                                                            "
                                                            >Se rappeler de
                                                            moi</label
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                class="btn btn-primary d-block btn-user w-100"
                                                type="submit"
                                            >
                                                Connexion
                                            </button>
                                            <hr />
                                        </form>
                                        <div class="text-center">
                                            <a
                                                class="small"
                                                href="forgot-password"
                                                >Mot De Passe Oublié<br />?</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</template>
