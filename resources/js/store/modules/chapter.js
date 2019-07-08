import axios from "axios";
const STORY_API = `api/chapters`

// initial state
const state = {
    chapter: {}
}

// getters
const getters = {
    getChapter: (state) => state.chapter,
}

// actions
const actions = {
    async fetchChapter({ commit }, chapterId) {
        const response = await axios.get(STORY_API + `/${chapterId}`)
        commit('setChapter', response.data)
    },
    async updateChapterContent({ state }, chapterId) {
        let data = new FormData();
        data.append("content", state.chapter.content);
        data.append('_method', 'PUT')

        await axios.post(STORY_API + `/${chapterId}`, data)
    }
}

// mutations
const mutations = {
    setChapter: (state, chapter) => { state.chapter = chapter },
}

export default {
    state,
    getters,
    actions,
    mutations
}
