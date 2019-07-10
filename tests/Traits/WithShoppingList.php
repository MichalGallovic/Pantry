<?php

namespace Tests\Traits;

use App\ShoppingList;
use App\ShoppingListItem;

trait WithShoppingList
{
    /**
     * @return array
     */
    private function makeShoppingListWithItems()
    {
        /** @var array */
        $newShoppingList = factory(ShoppingList::class)->make();
        $noGroceryItems  = factory(ShoppingListItem::class, 5)->make();
        $groceryItems    = factory(ShoppingListItem::class, 5)
            ->state('with-grocery')
            ->make()
            ->map(function (ShoppingListItem $item) {
                return [
                    'order'      => $item->order,
                    'completed'  => $item->completed,
                    'grocery_id' => $item->grocery_id
                ];
            });

        $newShoppingList->items = $groceryItems->concat($noGroceryItems)->toArray();

        return $newShoppingList->toArray();
    }

    /**
     * @return ShoppingList
     */
    private function createShoppingListWithItems()
    {
        /** @var array */
        $newShoppingList = factory(ShoppingList::class)->create();
        $noGroceryItems  = factory(ShoppingListItem::class, 5)->create(['shopping_list_id' => $newShoppingList->id]);
        $groceryItems    = factory(ShoppingListItem::class, 5)
            ->state('with-grocery')
            ->create(['shopping_list_id' => $newShoppingList->id])
            ->map(function (ShoppingListItem $item) {
                return [
                    'id' => $item->id,
                    'order' => $item->order,
                    'completed' => $item->completed,
                    'grocery_id' => $item->grocery_id
                ];
            });

        $newShoppingList->items = $groceryItems->concat($noGroceryItems)->toArray();

        return $newShoppingList;
    }
}
