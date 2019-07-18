<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /** @var string */
    protected $table = 'stock';

    protected $fillable = [
        'added_at', 'opened_at', 'amount', 'unit_type_id', 'grocery_id', 'place_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grocery()
    {
        return $this->hasOne(Grocery::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function place()
    {
        return $this->hasOne(Place::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function quantityType()
    {
        return $this->hasOne(UnitType::class, 'unit_type_id');
    }
}
