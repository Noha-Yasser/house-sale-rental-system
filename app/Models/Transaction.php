<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    public function booking(){
    return $this->belongsTo(Booking::class);
}
    use HasFactory;

     protected $fillable = [
        'amount',
        'payment_method',
        'status',
      ];

}
