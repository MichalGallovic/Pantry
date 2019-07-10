import Repository from './Repository';

const resource = '/shopping-lists';

export default {
    get(embedCount = ['items']) {
        return Repository.get(resource, { 'embed-count': embedCount });
    },
    find(id, relations = ['items-with-groceries'], counts = ['items']) {
        const path = `${resource}/${id}`;

        return Repository.get(path, { embed: relations, 'embed-count': counts });
    },
    create (payload) {
        return Repository.post(resource, payload);
    },
    updateItems (id, items) {
        const path = `${resource}/${id}/items`;

        return Repository.put(path, {items: items});
    },
    updateName (id, name) {
        const path = `${resource}/${id}`;

        return Repository.put(path, {name: name});
    },
    delete (id) {
        const path = `${resource}/${id}`;

        return Repository.delete(path);
    }
}
