import Vuex from 'vuex';
import categories from './modules/categories';

const createStore = () => {
    return new Vuex.Store({
        modules: {
            categories: categories,
        }
    });
};

export default createStore