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

    /** @var array */
    protected $hidden = [
        'created_at', 'updated_at', 'shopping_list_id', 'grocery_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shoppingList()
    {
        return $this->belongsTo(\App\ShoppingList::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grocery()
    {
        return $this->belongsTo(\App\Grocery::class);
    }

    public function getCompletedAttribute($value)
    {
        return !!$value;
    }
}
