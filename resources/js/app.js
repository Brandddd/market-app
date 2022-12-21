import './bootstrap'
import { createApp } from 'vue'

// ----- Component register -----
import ProductView from './components/Index.vue'

const app = createApp({
	components: {
		ProductView
	}
})

app.mount('#app')
