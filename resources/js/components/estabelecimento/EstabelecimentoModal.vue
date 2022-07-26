<template>
    <div>
        <b-modal id="estabelecimentoModal" hide-footer hide-header-close>
            <template #modal-title>
                <font-awesome-icon icon="fa-solid fa-building" /> 
                Adicionar Estabelecimento
            </template>
            <div class="d-block text-left">
                <b-form>
                    <b-form-group label-for="nome">
                        <label class="d-flex justify-content-between">
                            Nome
                        </label>

                        <b-form-input id="nome" type="text" placeholder="Nome do estabelecimento" autocomplete="off" v-model="form.email"></b-form-input>
                    </b-form-group>

                    <div class="row">
                        <div class="col-md-12">
                            <img src="/images/store.png" class="img-fluid"/>
                        </div>
                    </div>

                    <hr />
                </b-form>

                <b-button type="button" variant="primary" @click="salvar">
                    <i class="fas fa-sign-in-alt"></i> Salvar
                </b-button>
            </div>
        </b-modal>
    </div>
</template>

<script>
    import {api} from './../../config';

    export default {
        data() {
            return {
                form: {
                    nome: "",
                }
            }
        },
 
        methods: {
            salvar() {
                axios.post(api.estabelecimento, this.form).then(response => {
                    
                }).catch(error => {

                });
            }
        }
    }
</script>