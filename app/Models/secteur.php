<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secteur extends Model
{
    use HasFactory;

    public $table = "secteur";

    public function delegation(){
        return $this->belongsTo(delegation::class);
    }
}
