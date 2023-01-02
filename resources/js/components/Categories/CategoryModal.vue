<template>
	<div class="modal fade" id="category_modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">
						<strong>{{ `${is_create ? 'Crear' : 'Actualizar'} categoría` }}</strong>
					</h5>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="modal"
						aria-label="Close"
					></button>
				</div>
				<div class="modal-body">
					<form @submit.prevent="manageCategory" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="name" class="form-label">Nombre</label>
							<input
								type="text"
								class="form-control"
								id="name"
								v-model="category.name"
							/>
						</div>
						<section class="d-flex justify-content-center">
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary btn">
									<strong>{{
										`${is_create ? 'Crear categoría' : 'Actualizar nombre'}`
									}}</strong>
								</button>
							</div>
						</section>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import axios from 'axios'
import swal from 'sweetalert2'

export default {
	props: ['category_data'],
	data() {
		return {
			is_create: true,
			category: {},
			return: []
		}
	},
	created() {
		this.index()
	},
	methods: {
		index() {
			this.setCategory()
		},
		setCategory() {
			if (!this.category_data) return
			this.category = { ...this.category_data }
			this.is_create = false
		},
		loadFormData() {
			const form_data = new FormData()

			form_data.append('name', this.category.name)

			return form_data
		},
		async manageCategory() {
			try {
				const category = this.loadFormData()
				if (this.is_create) {
					await axios.post('../Categories/CreateCategory', category)
				} else {
					await axios.post(`../Categories/UpdateCategory/${this.category.id}`, category)
				}
				await swal.fire({
					icon: 'success',
					title: 'Felicidades!',
					text: 'Categoría actualizado correctamente.'
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
