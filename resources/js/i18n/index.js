import Vue from 'vue';
import VueInternationalization from 'vue-i18n';
import Locale from '../vue-i18n-locales.generated.js';

Vue.use(VueInternationalization);
const i18n = new VueInternationalization({
    locale: document.head.querySelector('meta[name="locale"]').content,
    messages: Locale
});

export default i18n;
