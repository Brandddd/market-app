<template>
	<div class="container">
		<!-- Load = true -->
		<section class="d-flex justify-content-center flex-wrap" v-if="load">
			<div
				class="card my-2 mx-3 text-center h-100"
				style="width: 400px"
				v-for="(product, index) in products"
				:key="index"
			>
				<div class="card-header">
					<h4 class="card-title">
						<strong>
							{{ product.name }}
						</strong>
					</h4>
				</div>

				<div class="card-body">
					<img
						src="https://api.lorem.space/image?w=150&h=180"
						class="card-img-top img-fluid"
						alt="Producto"
					/>
					<h5 class="card-text">
						<strong>{{ product.category.name }}</strong>
					</h5>
					<p class="card-text">$ {{ product.price }}</p>
					<div class="card-footer">
						<a href="#" class="btn btn-primary">Ver más...</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Loading Load = false -->
		<section class="d-flex justify-content-center my-3" v-else>
			<div class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Cargando...</span>
			</div>
		</section>
	</div>
</template>

<script>
export default {
	props: [],
	components: {},
	data() {
		return {
			products: [],
			load: false
		}
	},
	created() {
		this.index()
	},
	mounted() {},
	methods: {
		async index() {
			await this.getProducts()
		},
		async getProducts() {
			try {
				this.load = false
				const { data } = await axios.get('Products/GetAllProducts')
				this.products = data.products
				console.log(data.products)
				this.load = true
			} catch (error) {
				console.error(error)
			}
		}
	}
}
</script>
