<template>
    <body class="bg-gradient-primary" style="background: white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-2">
                                                Mot de passe oublié?
                                            </h4>
                                        </div>
                                        <form class="user">
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
                                            <button
                                                class="btn btn-primary d-block btn-user w-100"
                                                type="submit"
                                            >
                                                Restaurer le Mot De Passe
                                            </button>
                                        </form>
                                        <div class="text-center">
                                            <a class="small" href="/login"
                                                >Vous avez un compte?
                                                Connectez-vous!</a
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
