<template>
	<div class="container">
		@foreach ($products as $product)
		<div class="card my-2 mx-3" style="width: 18rem">
			<img
				src="https://api.lorem.space/image/game?w=150&h=220"
				class="card-img-top"
				alt="Producto"
			/>
			<!-- <div class="card-body">
				<h5 class="card-title">{{ $product->name }}</h5>
				<p class="card-text">{{ $product->description }}</p>
				<a href="#" class="btn btn-primary">Ver</a>
			</div> -->
		</div>
		@endforeach
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
