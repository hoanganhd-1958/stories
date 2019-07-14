const API = `http://localhost:8000/api/categories`
import axios from 'axios'

export default {
    async fetchListStoryInCategory({ commit }, categoryId) {
        var response = await axios.get(API + `/${categoryId}/story`);
        commit('setListStoryInCategory', response.data)
    }
}
