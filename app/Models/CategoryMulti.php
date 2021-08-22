<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class CategoryMulti extends Model
{
    use HasFactory, NodeTrait;

    protected $fillable = [
        'name',
        'parent',
    ];
}
