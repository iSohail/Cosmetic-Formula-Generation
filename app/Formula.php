<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Formula extends Model
{
    public $incrementing = false;

    protected $fillable = ['id', 'name', 'description'];

    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }

    public function cosmetics()
    {
        return $this->belongsToMany('App\Cosmetic')->using('App\CosmeticFormula');
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
