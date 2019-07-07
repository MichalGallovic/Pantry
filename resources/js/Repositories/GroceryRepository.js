import Repository from './Repository';

const resource = '/groceries';

export default {
    paginate (page = 1, relations = ['shop']) {
        return Repository.get(resource, { page: page, embed: relations});
    },
    get (relations = ['shop']) {
        return Repository.get(resource, { embed: relations });
    },
    search (term, relations = ['shop']) {
        return Repository.get(resource, { q: term, embed: relations });
    },
    find (id, relations = ['shop']) {
        const path = `${resource}/${id}`;

        return Repository.get(path, { embed: relations});
    },
    create (payload) {
        return Repository.post(resource, payload);
    },
    delete (id) {
        const path = `${resource}/${id}`;

        return Repository.delete(path);
    },
    update (id, payload) {
        const path = `${resource}/${id}`;

        return Repository.put(path, payload);
    }
}
