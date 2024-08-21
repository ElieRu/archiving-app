<template>
    <div id="update-modal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Modification</h4>
                    <button
                        class="btn-close"
                        type="button"
                        aria-label="Close"
                        data-bs-dismiss="modal"
                    ></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="my-2">
                            <label class="form-label">Nom</label
                            ><input
                                class="form-control"
                                type="text"
                                placeholder="Nom"
                            />
                        </div>
                        <div class="my-2">
                            <label class="form-label">Type</label
                            ><select class="form-select">
                                <optgroup label="This is a group">
                                    <option value="12" selected>
                                        This is item 1
                                    </option>
                                    <option value="13">This is item 2</option>
                                    <option value="14">This is item 3</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="my-2">
                            <label class="form-label">Description</label
                            ><textarea
                                class="form-control"
                                placeholder="Description"
                                style="height: 150px; resize: none;"
                            ></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            Modifier
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
