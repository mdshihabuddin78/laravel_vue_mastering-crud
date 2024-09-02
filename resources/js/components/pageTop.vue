<template>
    <div>
        <div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><router-link to="/admin/dashboard">Dashboard</router-link></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-6 text-start">
                <h2 class="mt-4">{{ $route.meta.pageTitle }}</h2>
            </div>
            <div class="col-md-6 text-end mt-2">
                <button @click="openModal()" class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                    <span>Add new</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "pageTop"
    }
</script>

<style scoped>

</style>