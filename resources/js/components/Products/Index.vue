<template>
	<div class="card mx-5 my-5">
		<div class="card-header d-flex justify-content-between">
			<h2><strong>Tabla de productos:</strong></h2>
			<button @click="openModal" class="btn btn-primary">Crear producto</button>
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
		<section v-if="load_modal">
			<modal-products :product_data="product" />
		</section>
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
		this.getProducts()
	},
	methods: {
		getProducts() {
			this.products = this.product_data
			this.load = true
		},
		openModal() {
			this.load_modal = true
			setTimeout(() => {
				// eslint-disable-next-line no-undef
				this.modal = new bootstrap.Modal(document.getElementById('product_modal'), {
					keyboard: false
				})
				this.modal.show()
				const modal = document.getElementById('product_modal')
				modal.addEventListener('hidden.bs.modal', () => {
					this.load_modal = false
					this.product = null
				})
			}, 200)
		},
		closeModal() {
			this.modal.hide()
			this.getProducts()
		},
		editProduct(product) {
			this.product = product
			this.openModal()
		}
	}
}
</script>
