<template>
    <div>
        <b-modal id="assinaturaModal" hide-footer hide-header-close>
            <template #modal-title>
                <font-awesome-icon icon="fa-solid fa-building" /> 
                Funcionalidade não permitida
            </template>

            <div class="row">
                <div class="col-md-12">
                    Problema com a sua assinatura
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-md-12">
                    <b-button type="button" variant="primary" @click="$bvModal.hide('assinaturaModal');">
                        <i class="fas fa-sign-in-alt"></i> Fechar
                    </b-button>
                </div>
            </div>
        </b-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                
            }
        }
    }
</script>