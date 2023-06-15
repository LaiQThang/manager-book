<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission_list extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'permission_lists';
}
