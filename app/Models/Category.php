<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Classify;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'id_category';

    protected $fillable = [
        'category_name',
    ];

    public function cate(): HasMany
    {
        return $this->hasMany(Classify::class);
    }
}
