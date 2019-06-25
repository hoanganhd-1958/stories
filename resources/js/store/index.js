import Vue from 'vue'
import Vuex from 'vuex'
import story from './modules/story'
import category from './modules/category'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        story,
        category
    },
    strict: false,
})