import ShopRepository from './ShopRepository';
import GroceryRepository from "./GroceryRepository";
import UnitTypeRepository from './UnitTypeRepository';
import SettingsRepository from './SettingsRepository';
import ShoppingListRepository from './ShoppingListRepository';

const repositories = {
    shop: ShopRepository,
    grocery: GroceryRepository,
    unitType: UnitTypeRepository,
    settings: SettingsRepository,
    shoppingList: ShoppingListRepository
};

export const RepositoryFactory = {
    get: name => repositories[name]
};
