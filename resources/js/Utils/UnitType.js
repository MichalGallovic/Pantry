import keyBy from 'lodash/keyBy';

let _unitTypesMap = {};
let _unitTypes = [];

export default {
    init (unitTypes) {
        if (Object.keys(_unitTypesMap).length === 0) {
            // @TODO maybe add some validation ?
            _unitTypes = unitTypes;
            _unitTypesMap = keyBy(unitTypes, 'id');
        }
    },
    getNameById (id) {
        if (id in _unitTypesMap) {
            return _unitTypesMap[id].shorthand;
        }
    },
    all () {
        return _unitTypes;
    }
};
