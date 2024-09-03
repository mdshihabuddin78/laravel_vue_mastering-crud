
import axios from "axios";

export default {
    data() {
        return {
            dataList: [],
            formData: {},
        };
    },
    methods: {
        getDataList() {
            axios
                .get(`${baseUrl}/${this.$route.meta.dataUrl}`)
                .then((response) => {
                    this.dataList = response.data.result;
                    this.success("Data loaded successfully!");
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                    this.error("Failed to load data.");
                });
        },
        submitForm() {
            const url = `${baseUrl}/${this.$route.meta.dataUrl}`;

            if (this.formData.id) {
                axios.put(`${url}/${this.formData.id}`, this.formData)
                    .then((response) => {
                        this.getDataList();
                        this.$toast.success("Data updated successfully!");
                        this.closeModal();
                    })
                    .catch((error) => {
                        console.error("Error updating category:", error);
                        this.error("Failed to update data. Please try again.");
                    });
            } else {
                axios.post(url, this.formData)
                    .then((response) => {
                        this.getDataList();
                        this.$toast.success("Data created successfully!");
                        this.closeModal();
                    })
                    .catch((error) => {
                        console.error("Error adding category:", error);
                        this.error("Failed to create data. Please try again.");
                    });
            }
        },
        openEditModal(data) {
            this.formData = { ...data };
            this.openModal("myModal", "show");
        },
        Categorydelete(id) {
            const url = `${baseUrl}/${this.$route.meta.dataUrl}/${id}`;
            axios
                .delete(url)
                .then((response) => {
                    this.dataList = this.dataList.filter((category) => category.id !== id);
                    this.$toast.success("Category deleted successfully!");
                })
                .catch((error) => {
                    console.error("Error deleting category:", error);
                    this.error("Failed to delete category. Please try again.");
                });
        },
    },
    mounted() {
        this.getDataList();
    },

};
