<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $primaryKey = 'orderID';
    
    protected $fillable = [
        'customerID',
        'branchID',
        'date',
        'status',
        'quantity',
        'sales_total',
        'payment_method',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

}
