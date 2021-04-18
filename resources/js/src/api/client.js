import axios from 'axios';

const baseURL = process.env.MIX_APP_V1_URL;

const client = axios.create({
    baseURL,
    headers: {
        ['Accept']: 'application/vnd.api+json',
        ['Content-Type']: 'application/vnd.api+json',
    }
});

export default client;
