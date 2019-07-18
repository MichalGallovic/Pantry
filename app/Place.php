<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /** @var string */
    const FRIDGE = 'fridge';

    /** @var string */
    const PANTRY = 'pantry';

    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groceries()
    {
        return $this->belongsToMany(Grocery::class);
    }
}
