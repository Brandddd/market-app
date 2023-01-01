<template>
	<div class="card mx-5 my-5">
		<div class="card-header d-flex justify-content-between">
			<h2><strong>Tabla de categorías:</strong></h2>
			<button class="btn btn-primary">Crear categoría</button>
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
	</div>
</template>

<script>
import CategoryTable from './CategoryTableList.vue'
export default {
	props: ['category_data'],
	components: {
		CategoryTable
	},
	data() {
		return {
			categories: [],
			load: false
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
		}
	}
}
</script>
