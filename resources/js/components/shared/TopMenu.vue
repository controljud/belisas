<template>
  <div class="forVue">
	<div>
		<b-navbar toggleable="lg" type="dark" variant="success">
			<router-link to="/" class="navbar-brand" exact >
				<img src="/images/belisas.png" class="logo-belisas"/>
				Belisas
			</router-link>
	
			<b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

			<b-collapse id="nav-collapse" is-nav>
				<b-navbar-nav class="ml-auto">
					<b-nav-item class="nav-link" @click="$bvModal.show('loginModal')" v-if="!logged">
						<font-awesome-icon icon="fa-solid fa-user" /> 
						Login
					</b-nav-item>
					<b-nav-item class="nav-link" @click="$bvModal.show('cadastroModal')" v-if="!logged">
						<font-awesome-icon icon="fa-solid fa-user-circle" /> 
						Cadastre-se
					</b-nav-item>
					<b-nav-item>
						<router-link :to="{name: 'home'}" class="nav-link" exact v-if="logged">
							<font-awesome-icon icon="fa-solid fa-home" /> 
							Home
						</router-link>
					</b-nav-item>
					<b-nav-item>
						<a class="nav-link" v-if="logged" @click="sair">
							<font-awesome-icon icon="fa-solid fa-close" /> 
							Sair
						</a>
					</b-nav-item>
				</b-navbar-nav>
			</b-collapse>
		</b-navbar>
	</div>
	
	<login-modal v-if="!logged"></login-modal>
	<esqueci-modal v-if="!logged"></esqueci-modal>
	<cadastro-modal v-if="!logged"></cadastro-modal>
  </div>
</template>

<script>
	import LoginModal from '../login/LoginModal.vue';
	import EsqueciModal from '../login/EsqueciModal.vue';
	import CadastroModal from '../login/CadastroModal.vue';
	
	export default {
		components: {
			'login-modal': LoginModal,
			'esqueci-modal': EsqueciModal,
			'cadastro-modal': CadastroModal,
		},

		data() {
			return {
				modalLogin: false,
				logged: false
			}
		},

		methods: {
			sair() {
				localStorage.removeItem('token');
				window.location.href = "/";
			}
		},

		created: function() {
			if (localStorage.getItem('token')) {
				this.logged = true;
			}
		}
	}
</script>

<style scoped>
	.navbar {
		padding-left: 15px;
	}

	.logo-belisas {
		width: 45px;
		margin-right: 5px;
	}
</style>