import Repository from './Repository';

const resource = '/shopping-lists';

export default {
    get() {
        return Repository.get(resource);
    },
    create (payload) {
        return Repository.post(resource, payload);
    }
}
