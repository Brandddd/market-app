<template>
	<section class="intro">
		<div class="mask d-flex align-items-center h-100">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12">
						<div class="card">
							<div class="card-body p-0">
								<div
									class="table-responsive table-scroll"
									data-mdb-perfect-scrollbar="true"
									style="position: relative; height: 700px"
								>
									<table class="table table-striped mb-0 text-center">
										<thead style="background-color: #002d72">
											<tr>
												<th scope="col">Identificador</th>
												<th scope="col">Nombre categoría</th>
												<th scope="col">Acciones</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="(category, index) in categories" :key="index">
												<td>{{ index }}</td>
												<td>{{ category.name }}</td>
												<td>
													<button class="btn btn-warning me-2">
														Cambiar nombre
													</button>
													<button class="btn btn-danger">Eliminar</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
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
	props: ['categories_data'],
	data() {
		return {
			categories: []
		}
	},
	created() {
		this.index()
	},
	methods: {
		index() {
			this.categories = { ...this.categories_data }
		},

	}
}
</script>

<style scoped>
table td,
table th {
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
}

thead th {
	color: #fff;
}

.card {
	border-radius: 0.5rem;
}

.table-scroll {
	border-radius: 0.5rem;
}

.table-scroll table thead th {
	font-size: 1.25rem;
}
thead {
	top: 0;
	position: sticky;
}
</style>
