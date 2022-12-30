<template>
	<!-- Modal -->
	<div class="modal fade" id="product_modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						<strong>{{ `${is_create ? 'Crear' : 'Actualizar'} producto` }}</strong>
					</h5>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="modal"
						aria-label="Close"
					></button>
				</div>
				<div class="modal-body">
					<!-- Formulario para crear producto dentro del modal -->
					<form @submit.prevent="manageProduct" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="images" class="form-label">Imagen</label>
							<input
								type="file"
								class="form-control"
								id="file"
								accept="image/*"
								@change="loadImage"
							/>
						</div>
						<!-- Vue - select libreria -->
						<div class="mb-3">
							<label for="category" class="form-label">Categoría</label>
							<v-select
								id="category"
								:options="categories"
								v-model="product.category_id"
								:reduce="category => category.id"
								label="name"
								:clearable="false"
							></v-select>
						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Nombre</label>
							<input
								type="text"
								class="form-control"
								id="name"
								v-model="product.name"
							/>
						</div>
						<div class="mb-3">
							<label for="description" class="form-label">Descripción</label>
							<textarea
								class="form-control"
								id="description"
								rows="3"
								v-model="product.description"
							></textarea>
						</div>
						<div class="mb-3">
							<label for="price" class="form-label">Precio</label>
							<input
								class="form-control"
								id="price"
								type="number"
								step="0.01"
								v-model="product.price"
							/>
						</div>
						<div class="mb-3">
							<label for="stock" class="form-label">Stock</label>
							<input
								type="number"
								class="form-control"
								id="stock"
								v-model="product.stock"
							/>
						</div>

						<!-- Para hacer una linea -->
						<hr />
						<section class="d-flex justify-content-center">
							<button
								type="button"
								class="btn btn-secondary mx-1"
								data-bs-dismiss="modal"
							>
								Cerrar
							</button>
							<button type="submit" class="btn btn-primary mx-1">
								<strong>{{ `${is_create ? 'Crear' : 'Actualizar'}` }}</strong>
							</button>
						</section>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import swal from 'sweetalert2'
import axios from 'axios'

export default {
	props: ['product_data'],
	data() {
		return {
			is_create: true,
			categories: [],
			product: {},
			file: null
		}
	},
	created() {
		this.index()
	},
	methods: {
		index() {
			this.getCategories()
			this.setProduct()
		},
		setProduct() {
			if (!this.product_data) return
			this.product = { ...this.product_data }
			this.is_create = false
		},
		loadImage(event) {
			this.file = event.target.files[0]
		},
		loadFormData() {
			const form_data = new FormData()

			if (this.file) form_data.append('image', this.file, this.file.name)

			form_data.append('category_id', this.product.category_id)
			form_data.append('name', this.product.name)
			form_data.append('description', this.product.description)
			form_data.append('price', this.product.price)
			form_data.append('stock', this.product.stock)
			return form_data
		},
		async getCategories() {
			const { data } = await axios.get('Categories/GetAllCategories')
			this.categories = data.categories
		},
		async manageProduct() {
			try {
				const product = this.loadFormData()
				if (this.is_create) {
					await axios.post('Products/CreateAProduct', product)
				} else {
					await axios.post(`Products/UpdateAProduct/${this.product.id}`, product)
				}
				await swal.fire({
					icon: 'success',
					title: 'Felicidades!',
					text: 'Producto almacenado.'
				})
				this.$parent.closeModal()
				location.reload()
			} catch (error) {
				await swal.fire({
					icon: 'error',
					title: 'Oops... Ha ocurrido un error',
					text: error.response.data.message
				})
			}
		}
	}
}
</script>

<style>
</style>
