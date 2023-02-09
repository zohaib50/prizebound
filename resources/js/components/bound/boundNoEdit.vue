<template>
    <form class="form" method="post" @submit.prevent="putData">

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label text-end">Category:</label>
            <div class="col-sm-8">
                <select v-model="form.category" class="form-control" :class="errors.category ? 'is-invalid' : ''"  placeholder="Category" @change="getYear(form.category)">
                    <option :value="null">Select Category</option>
                    <option v-for="categoryList in categoriesList" :value="categoryList.id">{{categoryList.text}}</option>
                </select>
                <span v-if="errors.category" class="invalid-feedback" role="alert">
                    <strong>{{errors.category[0]}}</strong>
                </span>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label text-end">Year:</label>
            <div class="col-sm-8">
                <select v-model="form.year" class="form-control" :class="errors.year ? 'is-invalid' : ''" placeholder="Year">
                    <option :value="null">Select Year</option>
                    <option v-for="yearList in yearsList" :value="yearList.id">{{yearList.text}}</option>
                </select>
                <span v-if="errors.year" class="invalid-feedback" role="alert">
                    <strong>{{errors.year[0]}}</strong>
                </span>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label text-end">Type:</label>
            <div class="col-sm-8">
                <select v-model="form.type" class="form-control" :class="errors.type ? 'is-invalid' : ''" placeholder="Type">
                    <option value="first">First</option>
                    <option value="second">Second</option>
                    <option value="third">Third</option>
                </select>
                <span v-if="errors.type" class="invalid-feedback" role="alert">
                    <strong>{{errors.type[0]}}</strong>
                </span>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-4 col-form-label text-end">Bound List:</label>
            <div class="col-sm-8">
                <input type="text" v-model="form.list" class="form-control" :class="errors.list ? 'is-invalid' : ''" placeholder="Bound List">
                <span v-if="errors.list" class="invalid-feedback" role="alert">
                    <strong>{{errors.list[0]}}</strong>
                </span>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label text-end"></label>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-sm btn-primary px-5">Update</button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    props:{
      bound:Object,
    },
    name: "categoryList",
    data(){
        return{
            form:{
              category:null,
              year:null,
              type:'third',
              list:null,
            },
            categoriesList:[],
            yearsList:[],
            errors: {},
        }
    },
    mounted() {
        console.log(this.bound)
        this.getCategory()
        this.getYear(this.bound.bound_category_id)
        this.form.category = this.bound.bound_category_id
        this.form.year = this.bound.bound_year_id
        this.form.type = this.bound.type
        this.form.list = this.bound.bound_no
    },
    methods:{
        putData(){
          axios.put('/bound/api/number/'+this.bound.id, this.form).then(response => {
              if(response.status == 200){
                  window.location.href = '/bound/list'
              }
          }).catch(errors => {
                this.errors = errors.response.data.errors
          })
        },
        getCategory(){
            axios.get('bound/api/categories/select2').then(response => {
                this.categoriesList = response.data
            })
        },
        getYear(cid){
            axios.get('bound/api/years/'+cid+'/select2').then(response => {
                this.yearsList = response.data
            })
        },
    }
}
</script>

<style scoped>

</style>
