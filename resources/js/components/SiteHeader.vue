<template>
    <header class="sm:flex sm:flex-wrap sm:items-center">
        <div class="flex items-center lg:w-auto">
            <div>
                <router-link :to="{ name: 'in-stock' }"><AppLogo/></router-link>
            </div>
            <!--<div class="ml-4">-->
                <!--<span class="text-xl font-bold text-gray-800">Pantry</span>-->
            <!--</div>-->
            <div class="flex text-xl ml-auto sm:hidden">
                <button type="button"
                        :class="{ 'text-gray-800': isOpened }"
                        class="m-auto text-gray-600 focus:outline-none focus:text-gray-800" @click="toggle">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
        <nav :class="{ 'hidden': !isOpened, 'block': isOpened }" class="sm:block sm:bg-gray-100 sm:ml-auto lg:w-auto lg:py-4 lg:ml-auto">
            <ul class="sm:flex text-right">
                <NavigationListItem text="In Stock" route="in-stock">
                </NavigationListItem>
                <NavigationListItem text="Recipes" route="recipes">
                </NavigationListItem>
                <NavigationListItem text="Shopping list" route="shopping-list">
                </NavigationListItem>
                <NavigationListItem text="Groceries" route="groceries">
                </NavigationListItem>
                <NavigationListItem text="Shops" route="shops">
                </NavigationListItem>
            </ul>
        </nav>
    </header>

</template>

<script>
import AppLogo from './StyledComponents/AppLogo';
import NavigationListItem from './NavigationListItem'

export default {
    components: {
        AppLogo,
        NavigationListItem
    },
    data () {
        return {
            isOpened: false
        }
    },
    methods: {
        toggle () {
            this.isOpened = !this.isOpened;
        },
        close () {
            this.isOpened = false;
        }
    },
    watch: {
        '$route' () {
            this.close();
        }
    }
};
</script>
