import axios from "axios";
const CATEGORY_API = `api/categories`
// initial state
const state = {
    categories: []
}

// getters
const getters = {
    allCategories: (state) => state.categories
}

// actions
const actions = {
    async fetchCategories({ commit }) {
        const response = await axios.get(CATEGORY_API)
        commit('setCategories', response.data)
    }
}

// mutations
const mutations = {
    setCategories: (state, categories) => { state.categories = categories }
}

export default {
    state,
    getters,
    actions,
    mutations
}
