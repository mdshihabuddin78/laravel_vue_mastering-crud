import axios from "axios";

export default {
    data() {
        return {


            dataList: [],
            formData: {
                name: '',
                category_id: '',
            },
        };

    },
    methods: {
        getDataList() {
            const _this = this;
            axios.get(`${baseUrl}/${this.$route.meta.dataUrl}`)
                .then(function (response) {
                    _this.dataList = response.data.result;
                })
                .catch(function (error) {
                    console.error('Error fetching data:', error);
                    _this.$toast.error('Failed to load data.');
                });
        },
        submitForm() {
            const _this = this;
            const url = `${baseUrl}/${this.$route.meta.dataUrl}`;

            if (_this.formData.id) {
                axios.put(`${url}/${_this.formData.id}`, _this.formData)
                    .then(function (response) {
                        _this.getDataList();
                        _this.$toast.success('Data updated successfully!');
                        _this.openModal('myModal', 'hide'); // Ensure modal ID is included
                    })
                    .catch(function (error) {
                        console.error('Error updating category:', error);
                        _this.$toast.error('Failed to update data. Please try again.');
                    });
            } else {
                axios.post(url, _this.formData)
                    .then(function (response) {
                        _this.getDataList();
                        _this.$toast.success('Data created successfully!');
                        _this.openModal('myModal', 'hide'); // Ensure modal ID is included
                    })
                    .catch(function (error) {
                        console.error('Error adding category:', error);
                        _this.$toast.error('Failed to create data. Please try again.');
                    });
            }
        },

        openEditModal(data) {
            this.formData = { ...data };
            this.openModal('myModal', 'show');
        },

        Categorydelete(id) {
            const _this = this;
            const url = `${baseUrl}/${this.$route.meta.dataUrl}/${id}`;

            axios.delete(url)
                .then(function (response) {
                    _this.dataList = _this.dataList.filter(category => category.id !== id);
                    _this.$toast.success('Category deleted successfully!');
                })
                .catch(function (error) {
                    console.error('Error deleting category:', error);
                    _this.$toast.error('Failed to delete category. Please try again.');
                });
        },
    }
};






