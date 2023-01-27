//axios adding
import axios from 'axios';

window.axios = axios;

axios.defaults.baseURL = 'http://localhost:8000/'
// axios.defaults.baseURL = 'http://feedback.saunamaterialkit.com/'


window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// seting up csrf-token in js
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// sweet alert imported

import Swal from 'sweetalert2';

window.Swal = Swal;



// vue js instance
// import { createApp } from 'vue';
// const app = createApp({});
//
// export const EventBus = new app();
