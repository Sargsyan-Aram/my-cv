import apiFactory from '../../api';
const authApi = apiFactory.get('auth');
import {toast} from "../../helpers";


export default {
    state: {

    },

    actions: {
        async authRegister({commit}, payload) {
           try{
               const res = await authApi.register(payload);
               console.log(res);
           } catch (error) {
               console.log(error.response.data.errors);
           }
        }
    },
    }
