import Repository from './Repository';
import memoize from 'lodash/memoize';

const resource = 'unit-types';

export default {
    get: memoize(() => {
        return Repository.get(`${resource}`).then(data => data.data);
    })
};
