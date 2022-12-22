<template>
	<table class="table" id="productTable">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Categoría</th>
				<th>Precio</th>
				<th>Stock</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(product, index) in products" :key="index">
				<td>{{ product.name }}</td>
				<td>{{ product.category.name }}</td>
				<td>{{ product.price }}</td>
				<td>{{ product.stock }}</td>
				<td>
					<button class="btn btn-warning me-2">Editar</button>
					<button class="btn btn-danger">Eliminar</button>
				</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
	props: ["products_data"],
	data() {
		return {
			products: []
		}
	},
	created() {
		this.products = this.products_data
		console.log(this.products)
	}
}
</script>

