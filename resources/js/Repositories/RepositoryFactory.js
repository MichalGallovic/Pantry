import ShopRepository from './ShopRepository';
import GroceryRepository from "./GroceryRepository";
import UnitTypeRepository from './UnitTypeRepository';

const repositories = {
    shop: ShopRepository,
    grocery: GroceryRepository,
    unitType: UnitTypeRepository
};

export const RepositoryFactory = {
    get: name => repositories[name]
};
