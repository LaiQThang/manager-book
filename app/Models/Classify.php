<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Classify extends Model
{
    use HasFactory;
    protected $table = 'classifies';

    protected $primaryKey = 'classify_id';

    protected $fillable = [
        'classify_name',
        'category_id',
    ];
    
    public function getJoinCate(){
        $result = DB::table($this->table)
        ->join('categories', $this->table.'.category_id', '=', 'categories.id_category')
        ->select($this->table.'.*', 'categories.category_name')
        ->get();
        return $result;
    }

    public function getJoinClassify($id){
        $result = DB::table($this->table)
        ->join('categories', $this->table.'.category_id', '=', 'categories.id_category')
        ->where($this->table.'.classify_id', '=', $id)
        ->select($this->table.'.*', 'categories.category_name', 'categories.id_category')
        ->get()
        ->first();
        return $result;
    }
}
