const API = `http://localhost:8000/api/categories`
import axios from 'axios'

export default {
    async fetchListCategory({ commit }) {
        var response = await axios.get(API);
        commit('setListCategory', response.data)
    }
}
