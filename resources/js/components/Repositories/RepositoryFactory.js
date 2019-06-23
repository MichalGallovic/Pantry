import ShopRepository from './ShopRepository';

const repositories = {
    shop: ShopRepository
};

export const RepositoryFactory = {
    get: name => repositories[name]
};
