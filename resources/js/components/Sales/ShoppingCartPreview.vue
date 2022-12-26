<template>
	<section class="h-100">
		<div class="container h-100 py-5 rounded border bg-beige">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-10">
					<div class="d-flex justify-content-between align-items-center mb-4">
						<!-- Nombre del producto -->
						<h2 class="fw-normal mb-0 text-black">
							<strong>Producto: </strong>{{ product_data.name }}
						</h2>
					</div>

					<div class="card rounded-3 mb-4">
						<div class="card-body p-4">
							<div class="row d-flex justify-content-between align-items-center">
								<div class="col-md-2 col-lg-2 col-xl-2">
									<!-- Imagen del producto -->
									<div v-if="product_data.image">
										<img
											:src="`/storage/images/${product_data.image}`"
											class="card-img-top"
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
								<!-- Precio Producto -->
								<div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
									<h5 class="mb-0">$ {{ product_data.price }}</h5>
								</div>
								<div class="col-md-1 col-lg-1 col-xl-1 text-center">
									<button class="btn btn-danger" onclick="history.go(-1);">
										Volver
									</button>
								</div>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-body p-4">
							<div class="row d-flex justify-content-between align-items-center">
								<button
									type="button"
									class="btn btn-success btn-block btn-lg"
									@click="addItem()"
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
export default {
	props: ['product_data', 'customer_id'],
	data() {
		return {
			product: {},
			products: []
		}
	},
	created() {
		this.product = this.product_data
	},
	methods: {
		addItem() {
			const get_cart = this.getItems()
			if (localStorage.getItem('products')) {
				// Añadiendo productos al arreglo correspondiente
				// Añade un producto al array con push
				get_cart.push({ ...this.product })
				this.deleteItems()
				localStorage.setItem(
					'products', // Nombre key string name
					JSON.stringify({
						[this.customer_id]: [get_cart]
					})
				)
			} else {
				localStorage.setItem(
					'products',
					// Asignado id del cliente a un array de productos
					JSON.stringify({
						[this.customer_id]: [this.product]
					})
				)
			}
		},
		deleteItems() {
			localStorage.removeItem('products')
		},
		getItems() {
			if (localStorage.getItem('products')) {
				const cart = JSON.parse(localStorage.getItem('products'))
				// Crea un nuevo array con la información de los productos en el carrito
				const cart_products = cart[`${this.customer_id}`].map(
					products_in_cart => products_in_cart
				)
				return cart_products
			} else {
				console.error('No hay nada en el local Storage')
			}
		}
	}
}
</script>

<style scoped>
.bg-beige {
	background-color: blanchedalmond;
}
</style>
