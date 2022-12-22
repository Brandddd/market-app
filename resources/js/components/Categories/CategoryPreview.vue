<template>
	<a href="#" class="link">
		<h2>{{ category_name }}</h2>
	</a>
	<div class="bg-secondary mb-4 py-4 d-flex">
		<div
			class="card text-center mx-3"
			style="width: 18rem"
			v-for="product in products_data"
			:key="product.id"
		>
			<img
				src="https://api.lorem.space/image/house?w=150&h=150"
				class="card-img-top"
				alt="Producto"
			/>
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
	props: ['products_data', 'category_name']
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
