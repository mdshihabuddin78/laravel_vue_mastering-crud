<template>
    <div class="container-fluid px-4">
        <page-top></page-top>
        <data-table :tableHeading="tableHeading">
            <tr v-for="(data, index) in dataList">
                <td>{{ index+1 }}</td>
                <td>{{ data.name }}</td>
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
        <form-modal :form-data="formData">
            <div class="row">
                <div class="col-md-12">
                    <label>Category Name</label>
                    <input v-model="formData.name" class="form-control" type="text">
                </div>
            </div>
        </form-modal>
    </div>
</template>

<script>
    import PageTop from "../../components/pageTop.vue";
    import DataTable from "../../components/dataTable.vue";
    import FormModal from "../../components/formModal.vue";

    export default {
        name: "categoryComponent",
        components: {FormModal, DataTable, PageTop},
        data(){
            return {
                tableHeading : ['Si', 'Name','Action'],
            }
        },
        mounted() {
            this.getDataList();
        }
    }
</script>

<style scoped>
    .datatable-top {
        padding: 0 !important;
    }
</style>