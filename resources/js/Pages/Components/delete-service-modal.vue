<script>
import { useForm } from "@inertiajs/vue3";
export default {
    props: ["id"],
    data() {
        return {
            form: useForm({
                id: null
            })
        }
    },
    methods: {
        deleteService() {
            this.form.id = this.id;            
            this.form.delete('/services', {
                onSuccess: () => {
                    this.$refs.closeBtn.click()
                }
            })
        },
    },
};
</script>

<template>
    <div
        id="delete-service-modal"
        class="modal fade"
        role="dialog"
        tabindex="-1"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Suppression</h4>
                    <button
                        class="btn-close"
                        type="button"
                        aria-label="Close"
                        data-bs-dismiss="modal"
                        ref="closeBtn"
                    ></button>
                </div>
                <div class="modal-body">
                    <p>Attention! <br> Vous allez supprimer les classeurs et documents que quontien ce service.</p>
                </div>
                <div class="modal-footer">
                    <button
                        class="btn btn-light"
                        type="button"
                        data-bs-dismiss="modal"
                    >
                        Fermer</button
                    ><button
                        class="btn btn-primary"
                        type="button"
                        @click="deleteService()"
                    >
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
