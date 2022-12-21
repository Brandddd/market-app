import _ from 'lodash'
import * as bootstrap from 'bootstrap'
import axios from 'axios'
import swal from 'sweetalert2'


// ----- Global import for libraries and dependencies -----
window._ = _
window.swal = swal
window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
window.bootstrap = bootstrap

