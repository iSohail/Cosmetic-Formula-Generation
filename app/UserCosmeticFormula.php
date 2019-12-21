<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserCosmeticFormula extends Pivot
{
    protected $table = 'user_cosmetic_formula';
    public $incrementing = true;

    protected $fillable = ['phase_name', 'percentage_used'];
}
