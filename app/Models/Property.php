<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyFactory> */
    use HasFactory;

     public function reviews(){
        return $this->hasMany(Review::class);
    }


        public function bookings()
      {
    return $this->hasMany(Booking::class);
     }


public function images() {
    return $this->hasMany(PropertyImage::class, 'property_id');
}


public function primaryImage() {
    return $this->hasOne(PropertyImage::class, 'property_id')->where('is_primary', true);
}
    protected $fillable = [
        'title',
        'description',
        'price',
        'type',
        'bedrooms',
        'area',
        'bathrooms',
        'address',
        'state',
        'status',
        'zip_code',
        'photo',
        'services',
        'unique_feature',
    ];

}
