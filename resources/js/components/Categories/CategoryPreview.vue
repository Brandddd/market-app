<template>
	<a :href="`/Categories/GetAllProductsByCategory/${category_data.id}`" class="link">
		<h2 class="text-center">
			Categoría: <strong>{{ category_data.name }}</strong>
		</h2>
	</a>
	<div class="mb-4 py-4 d-flex flex-wrap justify-content-evenly border rounded bg-white shadow-sm">
		<div
			class="card shadow text-center mx-3 my-3 ov-card-grid"
			style="width: 18rem"
			v-for="product in category_data.products"
			:key="product.id"
		>
			<div v-if="product.image">
				<img
					:src="`storage/images/${product.image}`"
					width="400"
					height="300"
					class="card-img-top"
					alt="Producto"
				/>
			</div>
			<div v-else>
				<img
					src="https://api.lorem.space/image/house?w=150&h=150"
					class="card-img-top"
					alt="Producto"
					width="400"
					height="300"
				/>
			</div>
			<div class="card-body">
				<h5 class="card-title">
					<strong>{{ product.name }}</strong>
				</h5>
				<p class="card-text">$ {{ product.price }}</p>
				<div class="row d-flex justify-content-between align-items-center">
					<a
						type="button"
						class="btn btn-success btn-block btn-lg mt-2"
						:href="`/Sales/AddProductToCart/${product.id}`"
					>
						Ver producto
					</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ['category_data']
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
