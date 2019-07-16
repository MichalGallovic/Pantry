import Repository from './Repository';

const resource = '/recipes';

export default {
    create (payload) {
        return Repository.post(resource, payload);
    }
}
