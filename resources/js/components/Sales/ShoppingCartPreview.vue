<template>
	<section class="h-100">
		<div class="container h-100 py-5 rounded border bg-beige">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-10">
					<div class="d-flex justify-content-between align-items-center mb-4">
						<h2 class="fw-normal mb-0 text-black">Añadir a carrito de compras</h2>
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
									<!-- Nombre producto -->
									<p class="lead fw-normal mb-2">{{ product_data.name }}</p>
									<!-- Categoría -->
									<p>
										<span class="text-muted">Categoría: </span>
										<span class="text-muted">{{
											product_data.category.name
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
										value="2"
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
								<div class="col-md-1 col-lg-1 col-xl-1 text-end">
									<button class="btn btn-danger">Quitar</button>
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
								<button
									type="button"
									class="btn btn-primary btn-block btn-lg mt-2"
									onclick="history.go(-1);"
								>
									Volver
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
	props: ['product_data', 'customer_user'],
	data() {
		return {
			product: {},
			products: []
		}
	},
	created() {
		this.product = this.product_data
		console.log(this.customer_user)
	},
	methods: {
		addItem() {
			this.getItems()
			if (this.products) {
				this.products = [...this.products, this.product]
				localStorage.setItem( 'products', JSON.stringify(this.products))
			} else {
				localStorage.setItem('products', JSON.stringify([this.product]))
			}
		},
		removeItem() {},
		getItems() {
			if (localStorage.getItem('products') != null) {
				this.products = JSON.parse(localStorage.getItem('products'))
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
