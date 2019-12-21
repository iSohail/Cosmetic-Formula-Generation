<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Cosmetic extends Model
{
    public $incrementing = false;

    protected $fillable = ['id', 'name'];

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function methods()
    {
        return $this->hasMany('App\Method');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')->using('App\CosmeticIngredient')->withPivot('min_percentage', 'max_percentage', 'optional');
    }

    public function formulas()
    {
        return $this->belongsToMany('App\Formula')->using('App\CosmeticFormula')->withPivot('min_percentage', 'max_percentage', 'phase_name');
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
