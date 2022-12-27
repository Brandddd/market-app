<!-- eslint-disable no-undef -->
<template>
	<section class="h-100 bg-beige">
		<div class="container h-100 py-5">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-10">
					<div class="d-flex justify-content-between align-items-center mb-4">
						<h3 class="fw-normal mb-0 text-black">
							¡Hola <strong>{{ customer.name }}</strong
							>, este es tu carrito de compras!
						</h3>
					</div>

					<div v-for="(product, index) in cart_products" :key="index">
						<div class="card rounded-3 mb-4">
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
											<span class="text-muted">Descripción: </span>M
											<span class="text-muted">{{ product.description }}</span>Grey
										</p>
									</div>
									<div class="col-md-3 col-lg-3 col-xl-2 d-flex">
										<button
											class="btn btn-link px-2"
											onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
										>
											<i class="fas fa-minus"></i>
										</button>

										<input
											id="form1"
											min="0"
											name="quantity"
											value="1"
											type="number"
											class="form-control form-control-sm"
										/>

										<button
											class="btn btn-link px-2"
											onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
										>
											<i class="fas fa-plus"></i>
										</button>
									</div>
									<div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
										<h5 class="mb-0">{{ product.price }}</h5>
									</div>
									<div class="col-md-1 col-lg-1 col-xl-1 text-end">
										<a href="#!" class="text-danger"
											><i class="fas fa-trash fa-lg"></i
										></a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-body">
							<div class="row d-flex justify-content-between align-items-center">
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
export default {
	props: ['customer'],
	created() {
		this.index()
	},
	data() {
		return {
			cart_products: []
		}
	},
	methods: {
		index() {
			this.getLocalItems()
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
		}
	}
}
</script>

<style scoped>
.bg-beige {
	background-color: #eee;
}
</style>
