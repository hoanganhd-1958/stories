import Vue from 'vue'
import Vuex from 'vuex'
import story from './modules/story'
import category from './modules/category'
import chapter from './modules/chapter'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        story,
        category,
        chapter
    },
    strict: false,
})
