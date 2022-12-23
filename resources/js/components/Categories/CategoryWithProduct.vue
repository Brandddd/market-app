<template>
	<h2>
		{{ category_data.name }}
	</h2>
	<div class="mb-4 py-4 d-flex flex-wrap justify-content-evenly border border-dark rounded">
		<div
			class="card text-center mx-3 my-3"
			style="width: 18rem"
			v-for="product in category_data.products"
			:key="product.id"
		>
			<div v-if="product.image">
				<img :src="`/storage/images/${product.image}`" class="card-img-top" alt="Producto" />
			</div>
			<div v-else>
				<img
					src="https://api.lorem.space/image/house?w=150&h=150"
					class="card-img-top"
					alt="Producto"
				/>
			</div>
			<div class="card-body">
				<h5 class="card-title">
					<strong>{{ product.name }}</strong>
				</h5>
				<p class="card-text">$ {{ product.price }}</p>
				<a href="#" class="btn btn-primary">Ver producto</a>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ['category_data'],
	mounted() {
		console.log(this.category_data)
	}
}
</script>

<style scoped>
.link {
	text-decoration: none;
	color: black;
}

.link:hover {
	color: cornflowerblue;
}
</style>
