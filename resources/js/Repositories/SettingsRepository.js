import Repository from './Repository';
import memoize from 'lodash/memoize';

const resource = '/settings';

export default {
    get: memoize(() => {
        return Repository.get(resource);
    })
}
