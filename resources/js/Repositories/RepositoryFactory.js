import ShopRepository from './ShopRepository';
import GroceryRepository from "./GroceryRepository";
import UnitTypeRepository from './UnitTypeRepository';
import SettingsRepository from './SettingsRepository';

const repositories = {
    shop: ShopRepository,
    grocery: GroceryRepository,
    unitType: UnitTypeRepository,
    settings: SettingsRepository
};

export const RepositoryFactory = {
    get: name => repositories[name]
};
