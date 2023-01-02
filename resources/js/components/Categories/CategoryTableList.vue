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
									<table class="table table-striped mb-0 text-center" id="categoryTable">
										<thead style="background-color: #002d72">
											<tr>
												<th scope="col">Identificador</th>
												<th scope="col">Nombre categoría</th>
												<th scope="col">Acciones</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="(category, index) in categories" :key="index">
												<td>{{ category.id }}</td>
												<td>{{ category.name }}</td>
												<td>
													<button class="btn btn-warning me-2" @click="getCategory(category.id)">
														Cambiar nombre
													</button>
													<button class="btn btn-danger" @click="deleteCategory(category)">Eliminar</button>
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
import axios from 'axios'
import swal from 'sweetalert2'

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
			/* this.mountDataTable() */
		},
		/* mountDataTable() {
			// eslint-disable-next-line no-undef
			setTimeout(() => $('#categoryTable').DataTable(), 200)
		}, */
		async getCategory(category_id) {
			try {
				const { data } = await axios.get(`Categories/GetCategory/${category_id}`)
				this.$parent.editCategory(data.category)
			} catch (error) {
				console.error(error)
			}
		},
		async deleteCategory(category) {
			try {
				const result = await swal.fire({
					icon: 'info',
					title: '¿Seguro deseas borrar la categoría?',
					text: '¡También se borrarán los productos ligados a ella!',
					showCancelButton: true,
					confirmButtonText: 'Eliminar'
				})
				if (!result.isConfirmed) return
				await axios.delete(`Categories/DeleteCategory/${category.id}`)
				this.$parent.getCategories()
				location.reload()
				swal.fire({
					icon: 'success',
					title: 'Felicidades!',
					text: 'Categoría eliminada exitosamente.'
				})
			} catch (error) {
				console.error(error)
			}
		}
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
