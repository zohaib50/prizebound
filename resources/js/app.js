import './vue-assets';
import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

// import { Bootstrap5Pagination } from 'laravel-vue-pagination';

import LaravelVuePagination from './Bootstrap5Pagination.vue';
app.component('Pagination', LaravelVuePagination)

import BoundCategoryList from './components/bound/categoryList.vue';
app.component('bound-category-list', BoundCategoryList);

import BoundYearList from './components/bound/yearList.vue';
app.component('bound-year-list', BoundYearList);

import BoundNoList from './components/bound/boundNoList.vue';
app.component('bound-no-list', BoundNoList);



app.mount('#app');
