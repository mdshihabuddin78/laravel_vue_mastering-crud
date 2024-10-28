<template>
    <div class="container-fluid px-4">
        <page-top></page-top>
        <data-table :tableHeading="tableHeading">
            <tr v-for="(data, index) in dataList">
                <td>{{ index+1 }}</td>
                <td>{{ data.name }}</td>
                <td>{{ data.email }}</td>
                <td>{{ data.contact_number }}</td>
                <td>{{ data.address }}</td>
                <td>
                    <a @click="openEditModal(data, data.id)" class="btn btn-outline-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a @click="Categorydelete(data.id, index)" class="btn btn-outline-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        </data-table>
        <form-modal ref="myModal" @submit="submitForm(formData)">

            <div class="row">
                <div class="col-md-12">
                    <label>Customer Name</label>
                    <input v-validate="'required'" v-model="formData.name" name="name" class="form-control" type="text" placeholder="Enter customer name">
                </div>

                <div class="col-md-12">
                    <label>Email</label>
                    <input v-validate="'required|email'" v-model="formData.email" name="email" class="form-control" type="email" placeholder="Enter customer email">
                </div>

                <div class="form-group">
                    <label >Phone</label>
                    <input v-validate="'required|numeric'" v-model="formData.contact_number" name="tel" class="form-control" type="tel" placeholder="Enter customer contact_number">
                </div>


                <div class="col-md-12">
                    <label>Address</label>
                    <input v-validate="'required'" v-model="formData.address" name="address" class="form-control" type="text" placeholder="Enter customer address">
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
        name: "CustomersComponent",
        components: {FormModal, DataTable, PageTop},
        data(){
            return {
                tableHeading : ['Si', 'Name','Email','Phone_Number','Address','Action'],
            }
        },
        mounted() {
            this.getDataList();
            this.$set(this.formData,);
        },
        methods: {
            // can(permission) {
            //     return this.permissions.includes(permission);
            // },
        },
    }
</script>

<style scoped>
    .datatable-top{
        padding: 0 !important;
    }
</style>