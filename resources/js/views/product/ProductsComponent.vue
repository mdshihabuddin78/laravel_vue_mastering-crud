<template>
    <div class="container-fluid px-4">
        <page-top></page-top>
        <data-table :tableHeading="tableHeading">
            <tr v-for="(data, index) in dataList">
                <td>{{ index+1 }}</td>
                <td>{{ data.name }}</td>
                <td>{{ data.category ? data.category : 'N/A' }}</td>
                <td>{{ data.price }}</td>
                <td>{{ data.stock }}</td>
                <td>
                <img :src="storageImage(data.image_url)" style="width: 50px; height: 50px" alt="Image">
                </td>
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
                    <label>Description</label>
                    <input v-validate="'required'" v-model="formData.description" name="Description" class="form-control" type="text" placeholder="Enter Description name">
                </div>
                <div class="col-md-12">
                    <label>Category</label>
                    <select v-validate="'required'" v-model="formData.category" name="category" class="form-control" type="text" >
                        <option value="">Select</option>
                        <template v-for="item in requiredData.category">
                            <option :value="item.id">{{ item.name }}</option>
                        </template>
                    </select>
                </div>
                <div class="col-md-12">
                    <label>Price</label>
                    <input v-validate="'required'" v-model="formData.price" name="price" class="form-control" type="text" placeholder="Enter price">
                </div>
                <div class="col-md-12">
                    <label>Stock Product</label>
                    <input v-validate="'required'" v-model="formData.stock" name="stock" class="form-control" type="text" placeholder="Enter stock">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <div @click="clickFileField('imageField')" class="image_upload" :style="{ 'background-image': 'url(' + publicImage('images/upload.png') + ')' }">
                                <template v-if="formData.image !== undefined">
                                    <img class="photo" :src="storageImage(formData.image_url)">
                                </template>
                            </div>
                            <input @change="uploadImage($event, formData, 'image_url')" type="file" name="image_url" id="imageField" class="file_field">
                        </div>
                    </div>
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
        name: "ProductsComponent",
        components: {FormModal, DataTable, PageTop},
        data(){
            return {
                tableHeading : ['Si', 'Name','Category','price','stock','Image','Action'],
            }
        },
        mounted() {
            this.getDataList();
            // this.$set(this.formData,);
            this.getRequiredData(['category']);
            this.$set(this.formData, 'name', '');
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
    .image_upload {
        width: 100px;
        height: 100px;
        background-size: cover;
        background-position: center;
        cursor: pointer;
        border: 1px dashed #ddd;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .photo {
        max-width: 50px;
        max-height: 50px;
        object-fit: cover;
    }
</style>