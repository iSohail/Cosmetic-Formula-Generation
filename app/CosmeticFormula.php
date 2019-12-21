<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CosmeticFormula extends Pivot
{
    protected $table = 'cosmetic_formula';
    public $incrementing = true;

    protected $fillable = ['phase_name', 'min_percentage', 'max_percentage'];
}
