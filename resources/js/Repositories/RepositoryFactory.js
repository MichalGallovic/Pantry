import ShopRepository from './ShopRepository';
import GroceryRepository from "./GroceryRepository";
import UnitTypeRepository from './UnitTypeRepository';
import SettingsRepository from './SettingsRepository';
import ShoppingListRepository from './ShoppingListRepository';
import ShoppingListItemRepository from './ShoppingListItemRepository';
import RecipeRepository from './RecipeRepository';
import PlaceRepository from './PlaceRepository';

const repositories = {
    shop: ShopRepository,
    grocery: GroceryRepository,
    unitType: UnitTypeRepository,
    settings: SettingsRepository,
    shoppingList: ShoppingListRepository,
    shoppingListItem: ShoppingListItemRepository,
    recipe: RecipeRepository,
    place: PlaceRepository
};

export const RepositoryFactory = {
    get: name => repositories[name]
};
