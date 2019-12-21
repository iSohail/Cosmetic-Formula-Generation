<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CosmeticIngredient extends Pivot
{
    protected $table = 'cosmetic_ingredient';
    public $incrementing = true;

    protected $fillable = ['optional', 'min_percentage', 'max_percentage', 'min_item', 'max_item'];

    public function ingredients()
    {
        return $this->belongsToMany(App\Ingredient);
    }
}
