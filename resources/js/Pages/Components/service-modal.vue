<template>
    <div id="service-modal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Créer un service</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-2 mt-2"><label class="form-label">Nom</label><input class="form-control" type="text" placeholder="Nom" /></div>
                        <div class="mb-2 mt-2"><textarea class="form-control" placeholder="Description" style="resize: none;height: 120px;"></textarea></div><button class="btn btn-primary" type="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>