import Repository from './Repository';

const resource = '/shops';

export default {
    get() {
        return Repository.get(`${resource}`).then(data => data.data);
    },
    find(id) {
        return Repository.get(`${resource}/${id}`).then(data => data.data);
    },
    createShop(payload) {
        return Repository.post(`${resource}`, payload).then(data => data.data);
    },
    delete(id) {
        return Repository.delete(`${resource}/${id}`).then(data => data.data);
    }
}
