import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// ----- Component register -----
import ProductView from './components/Index.vue'
import ProductsList from './components/Products/Index.vue'
import UsersList from './components/Users/Index.vue'

const app = createApp({
	components: {
		ProductView,
		ProductsList,
		UsersList
	}
})

app.component('v-select', vSelect)
app.mount('#app')
