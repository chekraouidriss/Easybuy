<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentcarte extends Model
{
    use HasFactory;
    protected $table = 'paymentcarte';
    public $timestamps = false;
    
    protected $fillable = [
        'numcart',
        'ExpirationDate',
        'CVV',
        'nom',
        'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
