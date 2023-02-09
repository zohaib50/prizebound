<template>
    <div class="table-responsive">
        <div class="d-flex justify-content-between">
            <div class="mb-3 me-2">
                <label class="form-label m-0">Search:</label>
                <input type="text" class="form-control form-control-sm" v-model="search" @input="getData">
            </div>
            <div class="d-flex justify-content-end">
                <div class="mb-3 me-2">
                    <label  class="form-label m-0">Category:</label><br>
                    <button type="button" class="btn btn-primary btn-sm" @click="checkBound">Check</button>
                </div>
            </div>
        </div>
        <table class="table table-striped w-100">
            <thead>
            <tr class="bg-dark text-white">
                <th class="p-2 rounded-start">#</th>
                <th class="p-2">Bound</th>
                <th class="p-2">Position</th>
                <th class="p-2">Bound No</th>
                <th class="p-2 text-end rounded-end">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in items">
                <td class="p-2">{{laravelData.from+index}}</td>
                <td class="p-2">{{item.category.name}}</td>
                <td class="p-2">{{item.type}}</td>
                <td class="p-2">{{item.bound_no}}</td>
                <td class="p-2 text-end">
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
export default {
    name: "dashboard",
    data(){
        return{
            items:[],
            laravelData:null,
            search:'',
            limit:10,
        }
    },
    mounted() {
        this.getData()
    },
    watch:{

    },
    methods:{
        getData(page= 1){
            axios.get('/bound/api/check/bound/list?page='+page+'&search='+this.search+'&limit='+this.limit).then(response => {
                this.items = response.data.data
                this.laravelData = response.data
            })
        },
        checkBound(){
            axios.get('/bound/api/check/bound/new').then(response => {
                this.getData()
            })
        },
        deleteData(id){
            axios.delete('/bound/api/check/bound/list/'+id).then(response =>{
                this.getData()
            })
        }
    }
}
</script>

<style scoped>

</style>
