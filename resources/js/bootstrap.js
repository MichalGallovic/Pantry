import UnitType from './Utils/UnitType';
import Settings from './Utils/Settings';
import { RepositoryFactory } from "./Repositories/RepositoryFactory";
const UnitTypeRepository = RepositoryFactory.get('unitType');
const SettingsRepository = RepositoryFactory.get('settings');

async function getUnitTypes () {
    const { data } = await UnitTypeRepository.get();
    return data;
}

async function getSettings () {
    const { data } = await SettingsRepository.get();
    return data;
}

export default () => {
    return new Promise(async (resolve, reject) => {
        UnitType.init(await getUnitTypes());
        Settings.init(await getSettings());
        resolve();
    });
};
