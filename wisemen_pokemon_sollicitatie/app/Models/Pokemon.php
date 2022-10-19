<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = [
        'abilities', 'base_experience', 'forms', 'game_indices', 'height', 'moves', 'name', 'types'
    ];
}
