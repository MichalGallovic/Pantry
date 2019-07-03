import Repository from './Repository';

const resource = '/groceries';

export default {
    paginate (perPage = 10) {
        return Repository.get(`${resource}/?paginate=${perPage}`).then(data => data.data);
    },
    search (query) {
        return Repository.get(`${resource}/search?q=${query}`).then(data => data.data);
    },
    create (payload) {
        return Repository.post(`${resource}`, payload).then(data => data.data);
    },
}
