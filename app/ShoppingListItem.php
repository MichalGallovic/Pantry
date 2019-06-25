<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingListItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'order', 'completed', 'shopping_list_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shoppingList()
    {
        return $this->belongsTo(\App\ShoppingList::class);
    }

}
