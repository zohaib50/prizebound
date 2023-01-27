<template>

</template>

<script>
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
            axios.get('/bound/api/years?search='+this.search+'&limit='+this.limit).then(response => {
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
    }
}
</script>

<style scoped>

</style>
