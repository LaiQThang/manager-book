<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission_item extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'permission_items';

    protected $fillable = [
        'permission_id',
        'permission_list_id'
    ];
}
