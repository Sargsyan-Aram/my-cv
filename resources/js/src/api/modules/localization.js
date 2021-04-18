import client from "../client";
const resource = 'localizations'

export default {
    getMessages: async locale => await client.get(`${resource}/${locale}/messages`)
}
