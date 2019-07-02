import ShopRepository from './ShopRepository';
import GroceryRepository from "./GroceryRepository";

const repositories = {
    shop: ShopRepository,
    grocery: GroceryRepository
};

export const RepositoryFactory = {
    get: name => repositories[name]
};
