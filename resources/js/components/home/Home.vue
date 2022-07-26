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
				<b-button variant="success" @click="$bvModal.show('estabelecimentoModal')" v-if="isButtonValid">
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
			<div class="col-md-3 store" v-for="item of items">
				<div class="card">
					<img class="card-img-top" src="/images/store.png" alt="Card image cap">
					<div class="card-body">
						<span class="store-name">{{item.nome}}</span>
					</div>
				</div>
			</div>
		</div>

		<estabelecimento-modal v-if="isButtonValid"></estabelecimento-modal>
		<assinatura-modal v-if="!isButtonValid"></assinatura-modal>
	</div>
</template>

<script>
	import {api} from './../../config';
	
	import EstabelecimentoModal from '../estabelecimento/EstabelecimentoModal.vue';
	import AssinaturaModal from '../shared/AssinaturaModal.vue';

	export default {
		components: {
			'estabelecimento-modal': EstabelecimentoModal,
			'assinatura-modal': AssinaturaModal,
		},

		data() {
            return {
                isButtonValid: true, //Verificar assinatura (se não for assinante, só autorizar a inclusão de um estabelecimento)
                header: {
					headers: {
						Authorization: null
					}
				},

				items: [
					{
						id: 1,
						nome: "Belinhas Salão de Beleza",
						image: "/images/store.png"
					},
					{
						id: 2,
						nome: "Barbeiro Antônio",
						image: "/images/store.png"
					},
					{
						id: 3,
						nome: "Socorro's Bar e Barbearia",
						image: "/images/store.png"
					},
				]
            }
        },

		mounted: function() {
			
		},

		created: function() {
			this.header.headers.Authorization = 'Bearer ' + localStorage.getItem('token');

			this.getEmpresas();
		},

		methods: {
            getEmpresas() {
				
			},
		}
	}
</script>

<style scoped>
.right {
	text-align: right;
}

.store :hover {
	border: 1px solid #696969;
	cursor: pointer;
	margin-bottom: 10px;
}

.stores {
	margin-top: 15px;
}

.store-name {
	font-weight: bold;
	font-size: 20px;
}
</style>