<template>
    <div class="modal fade" :id="modalId" tabindex="-1">
        <div class="modal-dialog">
            <form @submit.prevent="submit">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="btn-close" @click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <slot></slot>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" @click="closeModal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "formModal",
        props: {
            modalId: {
                type: [String],
                default: 'myModal',
            },
        },
        methods: {
            // show() {
            //     $(`#${this.modalId}`).modal('show');
            // },
            // closeModal() {
            //     $(`#${this.modalId}`).modal('hide');
            // },
            submit() {
                this.$emit('submit');
            },
        },
    };
</script>

<style scoped>

</style>
