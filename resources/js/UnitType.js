import keyBy from 'lodash/keyBy';

let unitTypesMap = {};

export default (data) => {
    unitTypesMap = keyBy(data, 'id');

    return {
        getNameById (id) {
            if (id in unitTypesMap) {
                return unitTypesMap[id].shorthand;
            }
        }
    }
};
