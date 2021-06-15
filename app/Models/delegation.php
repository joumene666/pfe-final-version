<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delegation extends Model
{
    use HasFactory;

    public $table ="delegation";

    protected static function boot(){

        parent::boot();
        
        static::addGlobalScope('secteurs', function($builder){
            $builder->with('secteurs');
        });

    }

    public function secteurs(){

        return $this->hasMany(secteur::class);
    }

    public function gouvernerat(){

        return $this->belongsTo(gouvernerat::class);
    }
}
