<template>
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
						<span class="text-muted"><strong>Descripción: </strong></span>
						<span class="text-muted d-block">{{ product.description }}</span>
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
						class="form-control form-control-sm my-4"
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
					<a @click="deleteItemFromCart(product.id)" class="btn text-danger"
						><i class="fas fa-trash fa-lg"></i
					></a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {}
</script>

<style>
</style>
