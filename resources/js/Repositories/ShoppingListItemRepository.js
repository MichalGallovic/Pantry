import Repository from './Repository';

const resource = '/shopping-lists/items';

export default {
    update (id, payload) {
        const path = `${resource}/${id}`;

        return Repository.put(path, payload);
    },
    delete (id) {
        const path = `${resource}/${id}`;

        return Repository.delete(path);
    }
}
