import Repository from './Repository';

const resource = '/shops';

export default {
    get() {
        return Repository.get(resource);
    },
    find(id) {
        const path = `${resource}/${id}`;

        return Repository.get(path);
    },
    create(payload) {
        return Repository.post(resource, payload);
    },
    update(payload, id) {
        const path = `${resource}/${id}`;

        return Repository.put(path, payload);
    },
    delete(id) {
        const path = `${resource}/${id}`;

        return Repository.delete(path);
    },
    searchGroceries(id, term, page) {
        const path = `${resource}/${id}/groceries`;

        return Repository.get(path, {q: term, page: page});
    }
}
