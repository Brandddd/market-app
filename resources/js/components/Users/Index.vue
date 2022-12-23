<template>
	<div class="card mx-5 my-5">
		<div class="card-header d-flex justify-content-between">
			<h2><strong>Tabla de usuarios:</strong></h2>
			<button @click="openModal" class="btn btn-primary">Crear usuario</button>
		</div>

		<div class="card-body">
			<!-- Load true -->
			<section class="table-responsive" v-if="load">
				<table-users :users_data="users" />
			</section>
			<!-- Load false -->
			<section class="d-flex justify-content-center my-3" v-else>
				<div class="spinner-border text-primary" role="status">
					<span class="visually-hidden">Cargando...</span>
				</div>
			</section>
		</div>
		<section v-if="load_modal">
			<modal-users :user_data="user" />
		</section>
	</div>
</template>

<script>
import TableUsers from './Table.vue'
import ModalUsers from './Modal.vue'

export default {
	props: ['user_data'],
	components: {
		TableUsers,
		ModalUsers
	},
	data() {
		return {
			users: [],
			load: false,
			load_modal: false,
			modal: null,
			user: null
		}
	},
	created() {
		this.getUsers()
	},
	methods: {
		getUsers() {
			this.users = this.user_data
			this.load = true
		},
		openModal() {
			this.load_modal = true
			setTimeout(() => {
				this.modal = new bootstrap.Modal(document.getElementById('user_modal'), {
					keyboard: false
				})
				this.modal.show()
				const modal = document.getElementById('user_modal')
				modal.addEventListener('hidden.bs.modal', () => {
					this.load_modal = false
					this.user = null
				})
			}, 200)
		},
		closeModal() {
			this.modal.hide()
			this.getUsers()
		},
		editUser(user) {
			this.user = user
			this.openModal()
		}
	}
}
</script>
