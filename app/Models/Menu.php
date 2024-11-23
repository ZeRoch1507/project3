<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Menu extends Model
{
    use HasFactory;
    protected $primaryKey = 'menu_id'; // Update if using a custom primary key

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
