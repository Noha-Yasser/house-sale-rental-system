<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;


    protected $fillable = [
        'company_name',
        'logo',
        'address',
        'description',
        'website',
        'rating',
        'country_id',
        'city_id'
    ];
protected $hidden = ['password'];

 public function user(){return $this->morphOne(User::class,'actor','actor_type','actor_id','id');}

}
