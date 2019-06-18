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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];    

    /**
     * Get the ShoppingList for the ShoppingListItem.
     */
    public function shoppingList()
    {
        return $this->belongsTo(\App\ShoppingList::class);
    }

}