<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Structer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $old = [];

    public function activity(){

        return $this->morphMany(Activity::class, 'subject');
    }

    public function recordActivity($type){

        $before = Arr::except($this->old, ['updated_at', 'created_at', 'password']);

        $after = Arr::except($this->attributesToArray(), ['updated_at', 'created_at', 'password']);

        return $this->activity()->create([

            'description' => $type,
            'changes' => [
                'before' => array_diff($before, $after),
                'after' => array_diff($after, $before)
            ],
            'user_id' => auth()->id()
        ]);
    }

    public function secteur(){

        return $this->belongsTo(secteur::class);
    }
}
