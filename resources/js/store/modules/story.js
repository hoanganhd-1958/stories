import axios from "axios";
const STORY_API = `api/stories`
// initial state
const state = {
    story: {
        name: null,
        summary: null,
        coverImage: null,
        categorySelections: [],
    },
    stories: [],
}

// getters
const getters = {
    allStories: (state) => state.stories,
    story: (state) => state.story,
}

// actions
const actions = {
    async fetchStories({ commit }) {
        const response = await axios.get(STORY_API)
        commit('setStories', response.data)
    },
    async newStory({ commit }, data) {
        let config = {
            header: {
                'Content-Type': 'multipart/form-data'
            }
        }
        const response = await axios.post(STORY_API, data, config)
    },
    async updateOneStory({ commit }, data, storyId) {
        let config = {
            header: {
                'Content-Type': 'multipart/form-data'
            }
        }
        console.log(storyId)
        const response = await axios.put(STORY_API + `/${storyId}`, data, config)
    },
    async fetchStory({ commit }, storyId) {
        if (typeof storyId === 'number') {
            const response = await axios.get(STORY_API + `/${storyId}`)
            commit('setStory', response.data)
        }
    },
}

// mutations
const mutations = {
    setStories: (state, stories) => { state.stories = stories },
    setStory: (state, story) => {
        state.story.name = story.name;
        state.story.summary = story.summary;
        state.story.coverImage = story.cover_image;
        state.story.categorySelections = story.categories;
    },
    clearStory(state) {
        state.story.name = null;
        state.story.summary = null;
        state.story.coverImage = null;
        state.story.categorySelections = [];
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}