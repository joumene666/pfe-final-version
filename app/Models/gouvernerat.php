<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gouvernerat extends Model
{
    use HasFactory;

    public $table = "gouvernerat";

    protected static function boot(){

        parent::boot();
        
        static::addGlobalScope('delegations', function($builder){
            $builder->with('delegations');
        });

    }
    public function delegations(){

        return $this->hasMany(delegation::class);
    }
}
