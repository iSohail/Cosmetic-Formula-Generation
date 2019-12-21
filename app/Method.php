<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Method extends Model
{
    public $incrementing = false;

    protected $fillable = ['id', 'step_num', 'description'];

    public function cosmetic()
    {
        return $this->belongsTo('App\Cosmetic');
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
