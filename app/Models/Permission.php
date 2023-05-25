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
}
