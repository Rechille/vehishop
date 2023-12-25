<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    
    protected $table = 'cars';

    protected $primaryKey = 'carID';
    
    protected $fillable = [
        'manufacturer',
        'model',
        'price',
        'vin',
        'description',
        'imageURL',
        'branchID',
    ];
}
