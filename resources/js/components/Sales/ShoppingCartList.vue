<template>
	<section class="h-100 bg-white border rounded shadow-lg">
		<div class="container h-100 py-5">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-10">
					<div class="mb-4">
						<h3 class="text-black text-center">
							¡Hola <strong>{{ customer.name }}</strong
							>, este es tu carrito de compras!
						</h3>
					</div>

					<div v-for="(product, index) in cart_products" :key="index">
						<div class="card rounded-3 mb-4 shadow">
							<div class="card-body p-4">
								<div class="row d-flex justify-content-between align-items-center">
									<div class="col-md-2 col-lg-2 col-xl-2">
										<div v-if="product.image">
											<img
												:src="`/storage/images/${product.image}`"
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
										<p class="lead fw-normal mb-2">{{ product.name }}</p>
										<p>
											<span class="text-muted"
												><strong>Descripción: </strong></span
											>
											<span class="text-muted d-block">{{
												product.description
											}}</span>
										</p>
									</div>
									<!-- Quantity -->
									<div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
										<h5 class="my-1">
											<strong>Catidad: </strong>{{ product.quantity }}
										</h5>
										<h5 class="my-1">
											<strong>Precio: </strong>${{ product.price }}
										</h5>
									</div>

									<div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
										<h5 class="mb-0">
											<strong>Precio total: </strong>${{
												product.total_price
											}}
										</h5>
									</div>
									<div class="col-md-1 col-lg-1 col-xl-1 text-end">
										<a
											@click="deleteItemFromCart(product.id)"
											class="btn text-danger"
											><i class="fas fa-trash fa-lg"></i
										></a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card shadow">
						<div class="card-body">
							<div class="row d-flex justify-content-between align-items-center">
								<div>
									<h5 class="my-3 text-center">
										<strong>Total: </strong>$ {{ this.total_price_to_pay }}
									</h5>
								</div>
								<hr/>
								<button type="button" class="btn btn-success btn-block btn-lg">
									Proceder al pago
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
	props: ['customer'],
	created() {
		this.index()
	},
	data() {
		return {
			cart_products: [],
			total_price_to_pay: 0
		}
	},
	methods: {
		index() {
			this.getLocalItems()
			this.totalPrice()
		},
		async getLocalItems() {
			this.cart_products = JSON.parse(localStorage.getItem(this.customer.id))
			if (!this.cart_products) {
				await swal.fire({
					icon: 'info',
					title: 'Hey hey hey! Tu carrito esta vacio. :(',
					text: 'Añade algo al carrito de compras primero!'
				})
				return (window.location = '/')
			}
		},
		deleteItemFromCart(productId) {
			this.cart_products = this.cart_products.filter(item => item.id != productId)
			localStorage.setItem(this.customer.id, JSON.stringify(this.cart_products))
			location.reload()
		},
		totalPrice() {
			for (let total of this.cart_products)
				this.total_price_to_pay = this.total_price_to_pay + total.total_price
		}
	}
}
</script>
