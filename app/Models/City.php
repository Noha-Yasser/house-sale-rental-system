<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;

    protected $fillable=[
    'name',
    'street',
    'country_id'
    ];
public function properties(){
        return $this->hasMany(property::class);
     }
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
