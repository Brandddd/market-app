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
				<td>{{ product.category?.name }}</td>
				<td>$ {{ product.price }}</td>
				<td>{{ product.stock }}</td>
				<td>
					<button class="btn btn-warning me-2" @click="getProduct(product.id)">
						Editar
					</button>
					<button class="btn btn-danger" @click="deleteProduct(product)">Eliminar</button>
				</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
import axios from 'axios'
import swal from 'sweetalert2'

export default {
	props: ['products_data'],
	data() {
		return {
			products: []
		}
	},
	created() {
		this.index()
	},
	methods: {
		index() {
			this.products = { ...this.products_data }
			this.mountDataTable()
		},
		mountDataTable() {
			// eslint-disable-next-line no-undef
			setTimeout(() => $('#productTable').DataTable(), 200)
		},
		async getProduct(product_id) {
			try {
				const { data } = await axios.get(`Products/GetAProduct/${product_id}`)
				this.$parent.editProduct(data.product)
			} catch (error) {
				console.error(error)
			}
		},
		async deleteProduct(product) {
			try {
				const result = await swal.fire({
					icon: 'info',
					title: '¿Seguro deseas borrar el producto?',
					showCancelButton: true,
					confirmButtonText: 'Eliminar'
				})
				if (!result.isConfirmed) return
				await axios.delete(`Products/DeleteAProduct/${product.id}`)
				this.$parent.getProducts()
				location.reload()
				swal.fire({
					icon: 'success',
					title: 'Felicidades!',
					text: 'Producto eliminado exitosamente.'
				})
			} catch (error) {
				console.error(error)
			}
		}
	}
}
</script>

