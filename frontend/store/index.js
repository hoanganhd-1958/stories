import Vuex from 'vuex';
import categories from './modules/categories';
import stories from './modules/stories';
import chapters from './modules/chapters';

const createStore = () => {
    return new Vuex.Store({
        modules: {
            categories: categories,
            stories: stories,
            chapters: chapters
        }
    });
};

export default createStore