<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    public function getAllPermission(){
        $permissions = DB::table($this->table)->get();

        return $permissions;
    }

    public function postAdd($data){
        return $result = DB::table($this->table)->insert($data);
    }

    public function getPermission($id){
        $permissions = DB::table($this->table)
        ->where('permission_id', '=', $id)
        ->get()
        ->first();

        return $permissions;
    }

    public function updatePermisson($data, $id){
        $result = DB::table($this->table)
        ->where('permission_id', '=', $id)
        ->update($data);
        return $result;
    }

    public function deletePermission($id) {
        return DB::table($this->table)
        ->where('permission_id', '=', $id)
        ->delete();
    }

}
