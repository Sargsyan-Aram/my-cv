import {SET_CURRENT_LOCALE, SET_MESSAGES} from '../mutations';
import apiFactory from '../../api';
const localizationApi = apiFactory.get('localization');

export default {
    state: {
        messages: null,
        currentLocale: null
    },
    getters: {
        getCurrentLocale: state => state.currentLocale,
        getMessage: (state) => (key) => state.messages ? state.messages[key] : null,
    },
    mutations: {
        [SET_CURRENT_LOCALE]: (state, payload) => state.currentLocale = payload,
        [SET_MESSAGES]: (state, payload) => state.messages = payload
    },
    actions: {
        async setLocales({commit}, locale = process.env.MIX_DEFAULT_LOCALE) {
            try {
                const res = await localizationApi.getMessages(locale);
                commit(SET_CURRENT_LOCALE, locale);
                commit(SET_MESSAGES, res.data.messages);
            } catch (error) {
                console.log(error);
            }
        }
    }
}
