import Vue from 'vue';
import Vuex from 'vuex';
import localization from "./modules/localization";
import auth from './modules/auth'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        localization,
        auth
    },
});
