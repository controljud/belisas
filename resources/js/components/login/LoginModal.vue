<template>
    <div>
        <b-modal id="loginModal" hide-footer hide-header-close>
            <template #modal-title>
                <font-awesome-icon icon="fa-solid fa-user" /> 
                Login
            </template>
            <div class="d-block text-left">
                <b-form>
                    <b-form-group label-for="email">
                        <label class="d-flex justify-content-between">
                            E-mail
                        </label>

                        <b-form-input id="email" type="email" placeholder="Digite seu e-mail" autocomplete="off" v-model="form.email"></b-form-input>
                    </b-form-group>
            
                    <b-form-group label-for="password">
                        <label class="d-flex justify-content-between">
                            Senha
                            <small><a href="#" @click="$bvModal.hide('loginModal');$bvModal.show('esqueciModal')">Esqueceu sua senha?</a></small>
                        </label>
            
                        <b-form-input id="password" type="password" placeholder="Digite sua senha" v-model="form.password"></b-form-input>
                    </b-form-group>

                    <hr />
                </b-form>

                <b-button type="button" variant="primary" @click="login">
                    <i class="fas fa-sign-in-alt"></i> Entrar
                </b-button>

                <b-button type="button" variant="outline-secondary" @click="$bvModal.hide('loginModal');$bvModal.show('cadastroModal')">
                    <i class="fas fa-user-plus"></i> Não tenho conta
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
                    password: ""
                }
            }
        },
 
        methods: {
            login() {
                axios.post(api.login, this.form).then(response => {
                    let dados = response.data;
                    
                    if (dados.status == 0) {
                        localStorage.setItem('user', JSON.stringify(dados.data.user));
                        localStorage.setItem('token', dados.data.token);

                        window.location.href = "/establishment";
                    } else {
                        this.$toast.warning("Não foi possível realizar o login");
                    }
                }).catch(error => {
                    this.$toast.error("Erro desconhecido ao realizar o login");
                });
            }
        }
    }
</script>