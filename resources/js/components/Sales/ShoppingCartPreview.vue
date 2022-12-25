<template>
	<section class="h-100">
		<div class="container h-100 py-5 rounded border bg-beige">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-10">
					<div class="d-flex justify-content-between align-items-center mb-4">
						<h2 class="fw-normal mb-0 text-black">Carrito de compras</h2>
					</div>

					<div class="card rounded-3 mb-4">
						<div class="card-body p-4">
							<div class="row d-flex justify-content-between align-items-center">
								<div class="col-md-2 col-lg-2 col-xl-2">
									<!-- Imagen del producto -->
									<img
										src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
										class="img-fluid rounded-3"
										alt="Cotton T-shirt"
									/>
								</div>
								<div class="col-md-3 col-lg-3 col-xl-3">
									<!-- Nombre producto -->
									<p class="lead fw-normal mb-2">Nombre producto</p>
									<!-- Categoría -->
									<p>
										<span class="text-muted">Categoría: </span>
										<span class="text-muted"> --- </span>
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
									<h5 class="mb-0">$499.00</h5>
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
								<button type="button" class="btn btn-success btn-block btn-lg">
									Terminar pago
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
export default {}
</script>

<style scoped>
.bg-beige {
	background-color: blanchedalmond;
}
</style>
