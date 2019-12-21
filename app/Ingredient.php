<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Ingredient extends Model
{
    public $incrementing = false;

    protected $fillable = ['id', 'name'];

    public function formulas()
    {
        return $this->hasMany('App\Formula');
    }

    public function cosmetics()
    {
        return $this->belongsToMany('App\Cosmetic')->using('App\CosmeticIngredient');
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
