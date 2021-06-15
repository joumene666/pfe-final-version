<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $old = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function structer(){

        return $this->belongsTo(Structer::class);
    }

    public function activities(){

        return $this->hasMany(Activity::class)->latest('updated_at');

    } 
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
}
