<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewsFactory> */
    use HasFactory;
    
     public function property(){
        return $this->belongsTo(Property::class);
    }


      protected $fillable = [
        'comments',
        'property_id',
      ];
}
