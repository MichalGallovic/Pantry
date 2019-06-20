import InStock from './components/Routes/InStock';
import Recipes from './components/Routes/Recipes/Recipes';
import CreateRecipe from './components/Routes/Recipes/CreateRecipe';
import ShoppingLists from './components/Routes/ShoppingList/ShoppingLists';
import ShowShoppingList from './components/Routes/ShoppingList/ShowShoppingList';
import CreateShoppingList from './components/Routes/ShoppingList/CreateShoppingList';
import Groceries from './components/Routes/Groceries/Groceries';
import CreateGrocery from './components/Routes/Groceries/CreateGrocery';
import Shops from './components/Routes/Shops/Shops';
import CreateShop from './components/Routes/Shops/CreateShop';

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
            name: 'recipes:create',
            component: CreateRecipe
        },
        {
            path: '/shopping-lists',
            component: ShoppingLists,
            name: 'shopping-lists'
        },
        {
            path: '/shopping-lists/:id',
            component: ShowShoppingList
        },
        {
            path: '/shopping-lists/create',
            component: CreateShoppingList,
            name: 'shopping-lists:create'
        },
        {
            path: '/groceries',
            component: Groceries,
            name: 'groceries'
        },
        {
            path: '/groceries/create',
            name: 'groceries:create',
            component: CreateGrocery
        },
        {
            path: '/shops',
            component: Shops,
            name: 'shops'
        },
        {
            path: '/shops/create',
            component: CreateShop,
            name: 'shops:create'
        }
    ]
};
