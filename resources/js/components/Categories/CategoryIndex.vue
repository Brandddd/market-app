<template>
	<h1>Hola componente Categorias tabla</h1>
</template>

<script>
export default {
	props: ['category_data'],
	data() {
		return {
			categories: []
		}
	},
	created() {
		this.index()
	},
	methods: {
		index() {
			this.getCategories
		},
		getCategories() {
			this.categories = this.category_data
		}
	}
}
</script>
