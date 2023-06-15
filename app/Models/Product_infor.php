<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_infor extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'product_infors';

    protected $primaryKey = 'id' ;

    protected $fillable = [
        'product_quantity',
        'product_size',
        'product_id',	
    ];
}
