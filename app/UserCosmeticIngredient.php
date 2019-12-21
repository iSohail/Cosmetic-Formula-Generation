<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserCosmeticIngredient extends Pivot
{
    public $table = 'user_cosmetic_ingredient';
    public $incrementing = true;

    protected $fillable = ['percentage_used'];

}
