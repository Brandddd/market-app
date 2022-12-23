<template>
	<table class="table" id="userTable">
		<thead>
			<tr>
				<th>Identificación</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(user, index) in users" :key="index">
				<td>{{ user.number_id }}</td>
				<td>{{ user.name }}</td>
				<td>{{ user.last_name }}</td>
				<td>{{ user.email }}</td>
				<td>
					<button class="btn btn-warning me-2" @click="getUser(user.id)">
						Editar
					</button>
					<button class="btn btn-danger" @click="deleteUser(user)">Eliminar</button>
				</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
	props: ['users_data'],
	data() {
		return {
			users: []
		}
	},
	created() {
		this.index()
	},
	methods: {
		index() {
			this.users = { ...this.users_data }
		},
		async getUser(user_id) {
			try {
				const { data } = await axios.get(`Users/GetAnUser/${user_id}`)
				this.$parent.editUser(data.user)
			} catch (error) {
				console.error(error)
			}
		},
		async deleteUser(user) {
			try {
				const result = await swal.fire({
					icon: 'info',
					title: '¿Seguro deseas borrar el usuario?',
					showCancelButton: true,
					confirmButtonText: 'Eliminar'
				})
				if (!result.isConfirmed) return
				await axios.delete(`Users/DeleteAnUser/${user.id}`)
				this.$parent.getUsers()
				location.reload()
				swal.fire({
					icon: 'success',
					title: 'Felicidades!',
					text: 'Usuario eliminado exitosamente.'
				})
			} catch (error) {
				console.error(error)
			}
		}
	}
}
</script>

<style>

</style>
