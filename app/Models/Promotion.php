<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $primaryKey = 'promotion_id'; // Adjust this if you have a different primary key
    protected $fillable = [
        'name',
        'image'
    ];
}
