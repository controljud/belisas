<template>
    <div>
        <b-modal id="establishmentModal" hide-footer hide-header-close>
            <template #modal-title>
                <font-awesome-icon icon="fa-solid fa-building" /> 
                Adicionar Estabelecimento
            </template>
            <div class="d-block text-left">
                <b-form>
                    <div class="row">
                        <div class="col-md-12">
                            <b-form-group label-for="nome">
                            <label class="d-flex justify-content-between">
                                Nome
                            </label>

                            <b-form-input id="nome" type="text" placeholder="Nome do estabelecimento" autocomplete="off" v-model="form.nome"></b-form-input>
                        </b-form-group>
                        </div>
                    </div>

                    <div class="row row_image">
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                </b-form>

                <hr />

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
        components: {
			
		},

        data() {
            return {
                header: {
                    headers: {
                        Authorization: null
                    }
                },
                form: {
                    id_user: null,
                    nome: null,
                    image: null
                },
                user: null,
            };
        },

        created: function () {
            this.header.headers.Authorization = "Bearer " + localStorage.getItem("token");
            this.user = JSON.parse(localStorage.getItem("user"));
        },

        methods: {
            salvar() {
                this.form.id_user = this.user.id;
                axios.post(api.establishment, this.form, this.header).then(response => {
                    if (response.data.status == 1) {
                        this.form.nome = null;
                        this.form.image = null;

                        this.$toast.success("Empreendimento cadastrado com sucesso");
                        this.$emit("getEstablishments");
                        this.$bvModal.hide("establishmentModal");
                    }
                    else {
                        this.$toast.warning("Erro no cadastro do empreendimento");
                    }
                }).catch(error => {
                    this.$toast.danger("Erro desconhecido");
                });
            }
        },
    }
</script>

<style>
.row_image {
    margin-top: 15px;
}
</style>