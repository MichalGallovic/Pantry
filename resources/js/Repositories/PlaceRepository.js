import Repository from './Repository';

const resource = '/places';

export default {
    get (relations = ['groceries']) {
        return Repository.get(resource, { embed: relations });
    },
    delete (id) {
        const path = `${resource}/${id}`;

        return Repository.delete(path);
    },
    create (payload) {
        return Repository.post(resource, payload);
    },
    update (id, payload) {
        const path = `${resource}/${id}`;

        return Repository.put(path, payload);
    }
}
