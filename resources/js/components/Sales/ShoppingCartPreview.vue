<template>
	<section class="h-100">
		<div class="container h-100 py-5 rounded border bg-white shadow-lg">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-10">
					<div>
						<!-- Nombre del producto -->
						<h2 class="mb-4 text-black text-center">
							<strong>Producto: </strong>{{ product_data.name }}
						</h2>
					</div>

					<div class="card rounded-3 mb-4 shadow">
						<div class="card-body p-4">
							<div class="row d-flex justify-content-between align-items-center">
								<div class="col-md-2 col-lg-2 col-xl-2">
									<!-- Imagen del producto -->
									<div v-if="product_data.image">
										<img
											:src="`/storage/images/${product_data.image}`"
											class="img-fluid rounded-3"
											alt="Producto"
										/>
									</div>
									<div v-else>
										<img
											src="https://api.lorem.space/image/house?w=150&h=150"
											class="img-fluid rounded-3"
											alt="Producto"
										/>
									</div>
								</div>
								<div class="col-md-3 col-lg-3 col-xl-3">
									<!-- Nombre categoría -->
									<p class="lead fw-normal mb-2">
										<strong>Categoría: </strong>
										{{ product_data.category.name }}
									</p>
									<!-- Descripción -->
									<p>
										<span class="text-muted"
											><strong>Descripción: </strong></span
										>
										<span class="text-muted">{{
											product_data.description
										}}</span>
									</p>
								</div>

								<!-- Cantidad -->
								<div class="col-md-3 col-lg-3 col-xl-2 d-flex">
									<input
										id="quantity"
										min="1"
										name="quantity"
										v-model.number="quantity"
										type="number"
										class="form-control form-control-sm my-4"
									/>
								</div>
								<!-- Precio Producto -->
								<div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1 text-center">
									<h5 class="mb-4">
										<strong>Precio: </strong> ${{
											product_data.price * this.quantity
										}}
									</h5>
								</div>
								<div class="col-md-1 col-lg-1 col-xl-1 text-center">
									<button class="btn btn-danger" onclick="history.go(-1);">
										Volver
									</button>
								</div>
							</div>
						</div>
					</div>

					<div class="card shadow">
						<div class="card-body p-4">
							<div class="row d-flex justify-content-between align-items-center">
								<button
									type="button"
									class="btn btn-success btn-block btn-lg"
									@click="addItemToCart(product_data.id)"
								>
									Añadir al carrito
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
import swal from 'sweetalert2'

export default {
	props: ['product_data', 'customer_id'],
	data() {
		return {
			quantity: 1
		}
	},
	created() {
		this.addItem()
	},
	methods: {
		addItem() {
			if (this.customer_id) {
				localStorage.setItem('products', JSON.stringify(this.product_data))
				if (!localStorage.getItem(this.customer_id)) {
					localStorage.setItem(this.customer_id, '[]')
				}
			} else {
				localStorage.removeItem(this.customer_id)
			}
		},
		addItemToCart(productId) {
			if (!this.customer_id) return (window.location = '/login')

			let product = JSON.parse(localStorage.getItem('products'))
			let product_quantity = { quantity: this.quantity }
			let total_price = { total_price: this.quantity * product.price }
			Object.assign(product, product_quantity, total_price)
			let customer_cart = JSON.parse(localStorage.getItem(this.customer_id))

			if (customer_cart.length == 0) customer_cart.push(product)
			else {
				let cart_item = customer_cart.find(item => item.id == productId)
				if (cart_item == undefined) customer_cart.push(product)
			}
			localStorage.setItem(this.customer_id, JSON.stringify(customer_cart))
			swal.fire({
				icon: 'success',
				title: 'Hecho!',
				text: 'Añadido al carrito exitosamente.'
			})
		},
	}
}
</script>

<style scoped>
.bg-beige {
	background-color: #eee;
}
</style>
