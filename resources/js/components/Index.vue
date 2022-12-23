<template>
	<div class="container">
		<!-- Load = true -->
		<section v-if="load">
			<category-preview
				v-for="category in categories"
				:key="category.id"
				:category_data="category"
			/>
		</section>
		<!-- Loading Load = false -->
		<section class="d-flex justify-content-center my-3" v-else>
			<div class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Cargando...</span>
			</div>
		</section>
	</div>
</template>

<script>
import CategoryPreview from './Categories/CategoryPreview.vue'

export default {
	props: ['categories_data'],
	components: {
		CategoryPreview
	},
	data() {
		return {
			categories: [],
			load: false
		}
	},
	mounted() {
		this.categories = this.categories_data.map(category => {
			return {
				...category,
				products: category.products.slice(0, 4)
			}
		})
		this.load = true
	},
	methods: {}
}
</script>
