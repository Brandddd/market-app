import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// ----- Component register -----
import ProductView from './components/Index.vue'
import ProductsList from './components/Products/Index.vue'
import UsersList from './components/Users/Index.vue'
import CategoryProducts from './components/Categories/CategoryWithProduct.vue'
import ShoppingCartPreview from './components/Sales/ShoppingCartPreview.vue'

const app = createApp({
	components: {
		ProductView,
		ProductsList,
		UsersList,
		CategoryProducts,
		ShoppingCartPreview
	}
})

app.component('v-select', vSelect)
app.mount('#app')
