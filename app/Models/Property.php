<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyFactory> */
    use HasFactory;


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
