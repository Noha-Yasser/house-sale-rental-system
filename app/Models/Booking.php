<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Booking extends Model
{
    //

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function property()
    {
       return $this->belongsTo(Property::class);
    }

    use HasFactory;
    protected $fillable=[
    'booking_date',
    'booking_time',
    'status',
    'note',
    'customer_id',
    'property_id',
    ];
}
