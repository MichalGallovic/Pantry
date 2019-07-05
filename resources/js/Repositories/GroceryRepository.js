import Repository from './Repository';

const resource = '/groceries';

export default {
    paginate (perPage = 10, relations = ['shop']) {
        return Repository.get(resource, { paginate: perPage, embed: relations});
    },
    search (term) {
        const path = `${resource}/search`;

        return Repository.get(path, { q: term });
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
