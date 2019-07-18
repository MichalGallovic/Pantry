<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /** @var string */
    const FRIDGE = 'fridge';

    /** @var string */
    const PANTRY = 'pantry';

    /** @var array */
    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groceries()
    {
        return $this->belongsToMany(Grocery::class);
    }
}
