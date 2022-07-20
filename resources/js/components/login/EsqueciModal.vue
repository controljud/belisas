<template>
    <div>
        <b-modal id="esqueciModal" hide-footer hide-header-close>
            <template #modal-title>
                <font-awesome-icon icon="fa-solid fa-user" /> 
                Esqueci a senha
            </template>
            <div class="d-block text-left">
                <b-form>
                    <b-form-group label-for="email">
                        <label class="d-flex justify-content-between">
                            E-mail
                        </label>

                        <b-form-input id="email" type="email" placeholder="Digite seu e-mail" autocomplete="off" v-model="form.email"></b-form-input>
                    </b-form-group>

                    <hr />
                </b-form>

                <b-button type="button" variant="primary" @click="esqueci">
                    <i class="fas fa-sign-in-alt"></i> Enviar lembrete
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
                    email: "",
                }
            }
        },

        methods: {
            esqueci() {
                // axios.post(api.login, this.form).then(response => {
                //     console.log(response);
                // });
                this.$toast.success("I'm a toast!");
            }
        }
    }
</script>