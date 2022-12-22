import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// ----- Component register -----
import ProductView from './components/Index.vue'

const app = createApp({
	components: {
		ProductView
	}
})

app.component('v-select', vSelect)
app.mount('#app')
