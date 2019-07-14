import Vuex from 'vuex';
import categories from './modules/categories';
import stories from './modules/stories';

const createStore = () => {
    return new Vuex.Store({
        modules: {
            categories: categories,
            stories: stories
        }
    });
};

export default createStore