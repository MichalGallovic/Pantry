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
    delete (id) {
        const path = `${resource}/${id}`;

        return Repository.delete(path);
    }
}
