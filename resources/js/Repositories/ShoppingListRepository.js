import Repository from './Repository';

const resource = '/shopping-lists';

export default {
    get() {
        return Repository.get(resource);
    }
}
