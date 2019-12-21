<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class UserCosmetic extends Model
{
    protected $table = 'user_cosmetic';
    public $incrementing = false;

    protected $fillable = ['id', 'name'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function methods()
    // {
    //     return $this->hasMany('App\Method');
    // }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'user_cosmetic_ingredient')->using('App\UserCosmeticIngredient')->withPivot('percentage_used');
    }

    public function formulas()
    {
        return $this->belongsToMany('App\Formula', 'user_cosmetic_formula')->using('App\UserCosmeticFormula')->withPivot('percentage_used', 'phase_name');
    }
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = self::generateUuid();
        });
    }
    public static function generateUuid()
    {
        return Uuid::generate()->string;
    }
}
