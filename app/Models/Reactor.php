<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactor extends Model
{
    protected $fillable = [
        'article',
        'name',
        'desc',
        'type',
        'status',
        'statusmodules',
        'start',
        'countmodules',
        'finish',
    ];

    use HasFactory;
}
