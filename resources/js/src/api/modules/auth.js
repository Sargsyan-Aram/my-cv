import client from "../client";
const resource = 'auth'

export default {
    register: async payload => await client.post(`${resource}/register`, payload)
}
