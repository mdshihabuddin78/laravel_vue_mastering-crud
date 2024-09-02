<template>
    <div class="container-fluid px-4">
        <page-top></page-top>
        <data-table :tableHeading="tableHeading">
            <tr v-for="(data, index) in dataList">
                <td>{{ index+1 }}</td>
                <td>{{ data.name }}</td>
                <td>Categry</td>
                <td>
                <td>
                    <a @click="openEditModal(data)" class="btn btn-outline-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a @click="Categorydelete(data.id)" class="btn btn-outline-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        </data-table>
        <form-modal :formData="formData" :categories="categories">
            <div class="row">
                <div class="col-md-12">
                    <label>SubCategory Name</label>
                    <input v-model="formData.name" class="form-control" type="text">
                </div>
                <div class="col-md-12">
                    <label>Category</label>
                    <select v-model="formData.category_id" class="form-control">
                        <option value="">Select</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                </div>
            </div>
        </form-modal>


    </div>
</template>

<script>
    import PageTop from "../../components/pageTop";
    import DataTable from "../../components/dataTable";
    import FormModal from "../../components/formModal";
    export default {
        name: "subCategoryComponent",
        components: {FormModal, DataTable, PageTop},
        data(){
            return{
                tableHeading : ['SL','Name','Category','Action']
            }
        },
        methods : {

        },
        mounted() {
            this.getDataList();
        }
    }
</script>

<style scoped>

</style>