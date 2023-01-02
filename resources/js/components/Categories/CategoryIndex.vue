<template>
	<div class="card mx-5 my-5">
		<div class="card-header d-flex justify-content-between">
			<h2><strong>Tabla de categorías:</strong></h2>
			<button @click="openModal()" class="btn btn-primary">Crear categoría</button>
		</div>

		<div class="card-body">
			<!-- Load true -->
			<section class="table-responsive" v-if="load">
				<category-table :categories_data="categories" />
			</section>
			<!-- Load false -->
			<section class="d-flex justify-content-center my-3" v-else>
				<div class="spinner-border text-primary" role="status">
					<span class="visually-hidden">Cargando...</span>
				</div>
			</section>
		</div>
		<section v-if="load_modal">
			<category-modal :category_data="category" />
		</section>
	</div>
</template>

<script>
import CategoryTable from './CategoryTableList.vue'
import CategoryModal from './CategoryModal.vue'
export default {
	props: ['category_data'],
	components: {
		CategoryTable,
		CategoryModal
	},
	data() {
		return {
			categories: [],
			load: false,
			load_modal: false,
			modal: null,
			category: null
		}
	},
	created() {
		this.index()
	},
	methods: {
		index() {
			this.getCategories()
		},
		getCategories() {
			this.categories = this.category_data
			this.load = true
		},
		openModal() {
			this.load_modal = true
			setTimeout(() => {
				// eslint-disable-next-line no-undef
				this.modal = new bootstrap.Modal(document.getElementById('category_modal'), {
					keyboard: false
				})
				this.modal.show()
				const modal = document.getElementById('category_modal')
				modal.addEventListener('hidden.bs.modal', () => {
					this.load_modal = false
					this.category = null
				})
			}, 200)
		},
		closeModal() {
			this.modal.hide()
			this.getCategories()
		},
		editCategory(category) {
			this.category = category
			this.openModal()
		}
	}
}
</script>
