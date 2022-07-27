<template>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Estabelecimentos</h3>
				<p>Selecione aqui o estabelecimento que deseja controlar, ou adicione um novo</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 right">
				<b-button variant="success" @click="$bvModal.show('establishmentModal')" v-if="isButtonValid">
					<font-awesome-icon icon="fa-solid fa-plus" /> 
					Novo estabelecimento
				</b-button>

				<b-button @click="$bvModal.show('assinaturaModal')" v-if="!isButtonValid">
					<font-awesome-icon icon="fa-solid fa-plus" /> 
					Novo estabelecimento
				</b-button>
			</div>
		</div>

		<div class="row stores">
			<div class="col-md-3" v-for="item of items">
				<div class="card store">
					<img v-if="item.image != null" class="card-img-top" v-bind:src="item.image" v-bind:alt="item.nome" @click="openEstablishment(item)" />
					<img v-if="item.image == null" class="card-img-top" src="/images/store.png" v-bind:alt="item.nome" @click="openEstablishment(item)" />
					<div class="card-body">
						<div class="row body-store">
							<div class="col-md-9" @click="openEstablishment(item)">
								<span class="store-name">{{item.nome}}</span>
							</div>
							<div class="col-md-3 right">
								<b-dropdown variant="light" toggle-class="text-decoration-none" id="dropdown-right" right no-caret>
									<template #button-content>
										<font-awesome-icon icon="fa-solid fa-ellipsis-v" />
									</template>
									<b-dropdown-item href="javascript:void(0)">
										<font-awesome-icon icon="fa-solid fa-edit" @click="editEstablishment(item)"/> 
										Editar
									</b-dropdown-item>
									<b-dropdown-item href="javascript:void(0)" @click="deleteEstablishment(item)"> 
										<font-awesome-icon icon="fa-solid fa-trash" /> 
										Excluir
									</b-dropdown-item>
								</b-dropdown>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<establishment-modal v-if="isButtonValid"
			@getEstablishments="getEstablishments"
		></establishment-modal>
		<assinatura-modal v-if="!isButtonValid"></assinatura-modal>
	</div>
</template>

<script>
	import {api} from './../../config';
	
	import EstablishmentModal from '../establishment/EstablishmentModal.vue';
	import AssinaturaModal from '../shared/AssinaturaModal.vue';
	import axios from 'axios';
	import ImagePreview from '../shared/ImagePreview.vue';

	export default {
		components: {
			'establishment-modal': EstablishmentModal,
			'assinatura-modal': AssinaturaModal,
			'image-preview': ImagePreview
		},

		data() {
            return {
                isButtonValid: true, //Verificar assinatura (se não for assinante, só autorizar a inclusão de um estabelecimento)
                header: {
					headers: {
						Authorization: null
					}
				},
				user: null,

				items: null,

				image: '/images'
            }
        },

		created: function() {
			this.header.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
			this.user = JSON.parse(localStorage.getItem('user'));

			this.getEstablishments();
		},

		methods: {
            getEstablishments() {
				axios.get(api.establishments + this.user.id, this.header).then(response => {
					this.items = response.data.data;
				}).catch(error => {
					if (error.response.status == 401) {
                        localStorage.removeItem('token');
                        localStorage.removeItem('user');
                        
                        window.location.href = '/';
                    }
				});
			},

			openEstablishment(item) {
				this.$toast.success("Abrindo estabelecimento: " + item.nome);
			},

			editEstablishment(item) {
				this.$toast.warning("Editando estabelecimento");
			},

			deleteEstablishment(item) {
				this.$toast.warning("Excluindo estabelecimento");
			}
		}
	}
</script>

<style scoped>
.right {
	text-align: right;
}

.store {
	cursor: pointer;
	margin-bottom: 15px;
}

.stores {
	margin-top: 15px;
}

.store-name {
	font-weight: bold;
	font-size: 20px;
}

.body-store {
	min-height: 65px;
}

.dropdown-menu {
	left: -160px !important;
}
</style>