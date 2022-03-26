import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        user: 0,
        collections:[]
    },
    mutations: {
        setUser (state,payload) {
            state.user = payload;
        },
        setCollections(state,payload){
            state.collections = payload
        }
    },
    actions:{
        async getCollections(context) {
            const response = await axios.get('/get-collections');
            context.commit('setCollections',response.data.items);
        }
    }
})

export default store;
