<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    
    protected $table = 'inventory';

    protected $primaryKey = 'ID';
    
    protected $fillable = [
        'carID',
        'branchID',
        'quantity',
        'arrival_date',
    ];

    protected $casts = [
        'date' => 'datetime',

    ];

}

