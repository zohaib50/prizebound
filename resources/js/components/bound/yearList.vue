<template>
    <div class="table-responsive">
        <div class="d-flex justify-content-between">
            <div class="mb-3">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="inputPassword6" class="col-form-label">Search:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" v-model="search" @input="getData">
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped w-100">
            <thead>
            <tr class="bg-dark text-white">
                <th class="p-2 rounded-start">#</th>
                <th class="p-2">Years</th>
                <th class="p-2">No. Categories</th>
                <th class="p-2 text-end rounded-end">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in items">
                <td class="p-2">{{laravelData.from+index}}</td>
                <td class="p-2">{{item.name}}</td>
                <td class="p-2">{{item.categories_count}}</td>
                <td class="p-2 text-end">
                    <a :href="'/bound/year/'+item.id" class="me-2 btn btn-sm btn-outline-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye-fill">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"></path>
                        </svg>
                    </a>
                    <a :href="'/bound/year/'+item.id+'/edit'" class="me-2 btn btn-sm btn-outline-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                        </svg>
                    </a>
                    <button type="button" @click="deleteData(item.id)" class="me-2 btn btn-sm btn-outline-danger">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <div>
                <select class="form-select form-select-sm" v-model="limit" @change="getData">
                    <option :value="10">10</option>
                    <option :value="50">50</option>
                    <option :value="100">100</option>
                    <option :value="500">5000</option>
                </select>
            </div>
            <div v-if="laravelData">
                <Pagination :data="laravelData" :limit="1" @pagination-change-page="getData" />
            </div>
        </div>
    </div>
</template>

<script>
// import Pagination from './Bootstrap5Pagination.vue';

export default {
    name: "categoryList",
    data(){
        return{
            items:[],
            laravelData:null,
            search:'',
            limit:10
        }
    },
    mounted() {
        this.getData()
    },
    methods:{
        getData(page= 1){
            axios.get('/bound/api/years?page='+page+'&search='+this.search+'&limit='+this.limit).then(response => {
                this.items = response.data.data
                this.laravelData = response.data
                console.log(this.laravelData)
            })
        },
        deleteData(id){
            axios.delete('/bound/api/year/'+id).then(response =>{
                this.getData()
            })
        }
    },
    components:{
        // Pagination
    }
}
</script>

<style scoped>

</style>
