import Repository from './Repository';
import memoize from 'lodash/memoize';

const resource = 'unit-types';

// Unit types do not change after app
// is loaded so we memoize them
export default {
    get: memoize(() => {
        return Repository.get(resource);
    })
};
