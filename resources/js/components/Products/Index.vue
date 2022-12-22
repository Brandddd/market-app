<template>
	<div class="card mx-5 my-5">
		<div class="card-header d-flex justify-content-between">
			<h2><strong>Tabla de productos:</strong></h2>
			<button class="btn btn-primary">Crear producto</button>
		</div>

		<div class="card-body">
			<!-- Load true -->
			<section class="table-responsive" v-if="load">
				<table-products :products_data="products" />
			</section>
			<!-- Load false -->
			<section class="d-flex justify-content-center my-3" v-else>
				<div class="spinner-border text-primary" role="status">
					<span class="visually-hidden">Cargando...</span>
				</div>
			</section>
		</div>
		<!-- <section v-if="load_modal"> -->
			<!-- Se lo enviamos al modal con un props de modal-->
			<!-- <modal :book_data="book" /> -->
		<!-- </section> -->
	</div>
</template>

<script>
import TableProducts from './Table.vue'
import ModalProducts from './Modal.vue'

export default {
	props: ['product_data'],
	components: {
		TableProducts,
		ModalProducts
	},
	data() {
		return {
			products: [],
			load: false,
			load_modal: false,
			modal: null,
			product: null
		}
	},
	created() {
		this.products = this.product_data
		this.load = true
	},
	methods: {
		openModal() {


		}
	}
}
</script>
