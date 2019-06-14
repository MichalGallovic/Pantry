import InStock from './components/Routes/InStock';
import Recipes from './components/Routes/Recipes';
import ShoppingList from './components/Routes/ShoppingList';
import Groceries from './components/Routes/Groceries';
import Shops from './components/Routes/Shops';

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            component: InStock,
            name: 'in-stock'
        },
        {
            path: '/recipes',
            component: Recipes,
            name: 'recipes'
        },
        {
            path: '/shopping-list',
            component: ShoppingList,
            name: 'shopping-list'
        },
        {
            path: '/groceries',
            component: Groceries,
            name: 'groceries'
        },
        {
            path: '/shops',
            component: Shops,
            name: 'shops'
        }
    ]
};
