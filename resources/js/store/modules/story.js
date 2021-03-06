import axios from "axios";
const STORY_API = `api/stories`
let config = {
    header: {
        'Content-Type': 'multipart/form-data'
    }
}
// initial state
const state = {
    stories: [],
    story: {
        id: null,
        name: null,
        summary: null,
        coverImage: null,
        categorySelections: [],
        chapters: [],
    }
}

// getters
const getters = {
    allStories: (state) => state.stories,
    oneStory: (state) => state.story
}

// actions
const actions = {
    async newStory({ commit, state }) {
        let data = new FormData();
        data.append("name", state.story.name);
        data.append("summary", state.story.summary);
        data.append("coverImage", state.story.coverImage);
        data.append(
            "categorySelections",
            JSON.stringify(state.story.categorySelections)
        );
        const response = await axios.post(STORY_API, data, this.config)
    },
    async fetchStories({ commit }) {
        const response = await axios.get(STORY_API)
        commit('setStories', response.data)
    },
    async fetchOneStory({ commit }, storyId) {
        const response = await axios.get(STORY_API + `/${storyId}`)
        commit('setOneStory', response.data)
    },
    clearState(context) {
        context.commit('clearStoryState');
    },
    async updateStory({ commit, state }, storyId) {
        let data = new FormData();
        data.append("name", state.story.name);
        data.append("summary", state.story.summary);
        data.append("coverImage", state.story.coverImage);
        data.append(
            "categorySelections",
            JSON.stringify(state.story.categorySelections)
        );
        data.append('_method', 'PUT')
        const response = await axios.post(STORY_API + `/${storyId}`, data, config)
    }
}

// mutations
const mutations = {
    setStories: (state, stories) => { state.stories = stories },
    setOneStory: (state, story) => {
        state.story.id = story.id
        state.story.name = story.name
        state.story.summary = story.summary
        state.story.coverImage = story.cover_image
        state.story.categorySelections = story.categories
        state.story.chapters = story.chapters
    },
    clearStoryState: (state) => {
        state.story.name = null
        state.story.summary = null
        state.story.coverImage = null
        state.story.categorySelections = []
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
