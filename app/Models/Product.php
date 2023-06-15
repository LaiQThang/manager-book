<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_code',
        'product_price',
        'product_des',
        'classify_id',
    ];

    protected $primaryKey = 'product_id';

    protected $table = 'products';

    // public function getProduct($id){
    //     $product = DB::table($this->table)
    //     ->where($this->table.'.product_id', '=', $id)
    //     ->join('product_infors', 'product_infors.product_id', '=', $this->table.'.product_id')
    //     ->join('product_images', 'product_images.product_id', '=', $this->table.'.product_id')
    //     ->select($this->table.'.*', 'product_images.product_img', 'product_infors.product_quantity', 'product_infors.product_size')
    //     ->get();

    //     return $product;
    // }
}
