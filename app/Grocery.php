<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grocery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'expiration_days', 'units', 'unit_type', 'price', 'shop_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'unit_type_id', 'shop_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];    

    public function shop()
    {
        return $this->belongsTo(\App\Shop::class);
    }

    public function recipes()
    {
        return $this->belongsToMany(\App\Recipe::class);
    }

    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }
}
