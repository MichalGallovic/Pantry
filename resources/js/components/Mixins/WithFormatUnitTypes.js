import UnitType from "../../Utils/UnitType";

export default {
    methods: {
        formatUnits (units, unitTypeId) {
            if (units && unitTypeId) {
                return `${units} ${UnitType.getNameById(unitTypeId)}`;
            }

            return null;
        },
        unitType (unitTypeId) {
            return UnitType.getNameById(unitTypeId);
        }
    }
}
