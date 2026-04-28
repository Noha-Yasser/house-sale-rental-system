<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory,SoftDeletes;

    protected $fillable=[
    'country_name',
    'code',
    ];

    public function cities(){
        return $this->hasMany(city::class);
     }

     protected static function boot(){
        parent::boot();
        static::deleting(function($country){
            $country->cities()->delete();
        });
     }
}
