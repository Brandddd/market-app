<template>
	<!-- Modal -->
	<div class="modal fade" id="user_modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						<strong>{{ `${is_create ? 'Crear' : 'Actualizar'} usuario` }}</strong>
					</h5>
					<button
						type="button"
						class="btn-close"
						data-bs-dismiss="modal"
						aria-label="Close"
					></button>
				</div>
				<div class="modal-body">
					<!-- Formulario para crear usuario dentro del modal -->
					<form @submit.prevent="manageUser" enctype="multipart/form-data">
						<!-- Vue - select libreria -->
						<div class="mb-3">
							<label for="identificacion" class="form-label">Identificación</label>
							<input
								type="number"
								class="form-control"
								id="identificacion"
								v-model="user.number_id"
							/>
						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Nombre</label>
							<input
								type="text"
								class="form-control"
								id="name"
								v-model="user.name"
							/>
						</div>
						<div class="mb-3">
							<label for="last_name" class="form-label">Apellido</label>
							<input
								type="text"
								class="form-control"
								id="last_name"
								v-model="user.last_name"
							/>
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Correo</label>
							<input
								type="email"
								class="form-control"
								id="email"
								v-model="user.email"
							>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Contraseña</label>
							<input
								class="form-control"
								id="password"
								type="password"
								required
								v-model="user.password"
							/>
						</div>
						<div class="mb-3">
							<label for="password_confirmation" class="form-label">Confirmar contraseña</label>
							<input
								class="form-control"
								id="password_confirmation"
								type="password"
								required
								v-model="user.password_confirmation"
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
import axios from 'axios'
import swal from 'sweetalert2'

export default {
	props: ['user_data'],
	data() {
		return {
			is_create: true,
			user: {},
		}
	},
	created() {
		this.index()
	},
	methods: {
		index() {
			this.setUser()
		},
		setUser() {
			if (!this.user_data) return
			this.user = { ...this.user_data }
			this.is_create = false
		},
		loadFormData() {
			const form_data = new FormData()

			form_data.append('number_id', this.user.number_id)
			form_data.append('name', this.user.name)
			form_data.append('last_name', this.user.last_name)
			form_data.append('email', this.user.email)
			form_data.append('password', this.user.password)
			form_data.append('password_confirmation', this.user.password_confirmation)
			return form_data
		},
		async manageUser() {
			try {
				const user = this.loadFormData()
				if (this.is_create) {
					await axios.post('Users/CreateAnUser', user)
				} else {
					await axios.post(`Users/UpdateAnUser/${this.user.id}`, user)
				}
				swal.fire({
					icon: 'success',
					title: 'Felicidades!',
					text: 'Usuario creado.'
				})

				this.$parent.closeModal()
				location.reload()
			} catch (error) {
				console.error(error)
				swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Algo salió mal!'
				})
			}
		}
	}
}
</script>

