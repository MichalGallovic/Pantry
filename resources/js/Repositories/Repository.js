import a from 'axios'
import {API_PREFIX} from "../config";
import Query from '../Utils/Query';

const axios = a.create({
    baseURL: API_PREFIX
});

export default {
    get (path, parameters) {
        const url = Query.make(path, parameters);
        return axios.get(url).then(data => data.data);
    },
    post (path, data) {
        return axios.post(path, data).then(data => data.data);
    },
    put (path, data) {
        return axios.put(path, data).then(data => data.data);
    },
    delete (path) {
        return axios.delete(path).then(data => data.data);
    }
};
