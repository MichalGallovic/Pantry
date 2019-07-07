const InStock = () => import('./components/Routes/InStock');
const Recipes = () => import('./components/Routes/Recipes/Recipes');
const CreateRecipe = () => import('./components/Routes/Recipes/CreateRecipe');
const ShoppingLists = () => import('./components/Routes/ShoppingList/ShoppingLists');
const ShowShoppingList = () => import('./components/Routes/ShoppingList/ShowShoppingList');
const CreateShoppingList = () => import('./components/Routes/ShoppingList/CreateShoppingList');
const Groceries = () => import('./components/Routes/Groceries/Groceries');
const CreateGrocery = () => import('./components/Routes/Groceries/CreateGrocery');
const Shops = () => import('./components/Routes/Shops/Shops');
const CreateShop = () => import('./components/Routes/Shops/CreateShop');
const ShowShop = () => import("./components/Routes/Shops/ShowShop");
const EditShop = () => import('./components/Routes/Shops/EditShop');
const ShowGrocery = () => import("./components/Routes/Groceries/ShowGrocery");
const EditGrocery = () => import('./components/Routes/Groceries/EditGrocery');

export default {
    mode: 'history',
    base: '/app',
    routes: [
        {
            path: '',
            component: InStock,
            name: 'in-stock'
        },
        {
            path: '/recipes',
            component: Recipes,
            name: 'recipes',
        },
        {
            path: '/recipes/create',
            name: 'recipes.create',
            component: CreateRecipe
        },
        {
            path: '/shopping-lists',
            component: ShoppingLists,
            name: 'shopping-lists'
        },
        {
            path: '/shopping-lists/create',
            component: CreateShoppingList,
            name: 'shopping-lists.create'
        },
        {
            path: '/shopping-lists/:id',
            component: ShowShoppingList,
            name: 'shopping-lists.show'
        },
        {
            path: '/groceries',
            component: Groceries,
            name: 'groceries'
        },
        {
            path: '/groceries/create',
            name: 'groceries.create',
            component: CreateGrocery
        },
        {
            path: '/groceries/:id',
            component: ShowGrocery,
            name: 'groceries.show',
            props: true
        },
        {
            path: '/groceries/:id/edit',
            component: EditGrocery,
            name: 'groceries.edit',
            props: true
        },
        {
            path: '/shops',
            component: Shops,
            name: 'shops'
        },
        {
            path: '/shops/create',
            component: CreateShop,
            name: 'shops.create'
        },
        {
            path: '/shops/:id',
            component: ShowShop,
            name: 'shops.show',
            props: true
        },
        {
            path: '/shops/:id/edit',
            component: EditShop,
            name: 'shops.edit',
            props: true
        },
    ]
};
