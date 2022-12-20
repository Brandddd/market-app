import './bootstrap'
import { createApp } from 'vue'

// ----- Component register -----
import ExampleComponent from './components/ExampleComponent.vue'

const app = createApp({
	components: {
		ExampleComponent
	}
})

app.mount('#app')
