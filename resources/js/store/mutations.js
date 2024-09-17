export const mutations ={
    dataList(state, data){
        state.dataList = data;
    },
    formData(state, data){
        state.formData = data;
    },
    updateId(state, data){
        state.updateId = data;
    },

    formType(state, data){
        state.formType = data;
    },
    requiredData(state, data){
        state.requiredData = data;
    },
    Config(state, data){
        state.Config = data;
    },
    permissions(state, data){
        state.permissions = data;
    }

};