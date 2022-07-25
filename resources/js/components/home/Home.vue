<template>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Estabelecimentos</h3>
				<p>Selecione aqui o estabelecimento que deseja controlar</p>
			</div>
		</div>
	</div>
</template>

<script>
	import {api} from './../../config';

	export default {
		data() {
            return {
                header: {
					headers: {
						Authorization: null
					}
				},
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

</style>