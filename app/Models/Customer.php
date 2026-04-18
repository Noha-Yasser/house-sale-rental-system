<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    protected $fillable = [
        'email',
        'password',
        'gender',
        'birthday',
        'identity_id',
        'country_id',
        'city_id'
    ];

    protected $hidden = ['password'];
    public function user() {
    return $this->morphOne(User::class, 'actor');
}
    // public function user(){return $this->morphOne(User::class,'actor','actor_type','actor_id','id');}
}
