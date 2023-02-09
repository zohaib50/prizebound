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

import BoundNoCreate from './components/bound/boundNoCreate.vue';
app.component('bound-no-create', BoundNoCreate);

import BoundNoEdit from './components/bound/boundNoEdit.vue';
app.component('bound-no-edit', BoundNoEdit);

import BoundNoList from './components/bound/boundNoList.vue';
app.component('bound-no-list', BoundNoList);

import YourBoundCreate from './components/bound/yourBoundCreate.vue';
app.component('your-bound-create', YourBoundCreate);

import YourBoundEdit from './components/bound/yourBoundEdit.vue';
app.component('your-bound-edit', YourBoundEdit);

import YourBoundList from './components/bound/yourBoundList.vue';
app.component('your-bound-list', YourBoundList);

import Dashboard from './components/bound/dashboard.vue';
app.component('dashboard', Dashboard);

app.mount('#app');
