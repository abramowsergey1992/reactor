<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $casts = [
        'start' => 'datetime:d.m.Y',
        'finish' => 'datetime:d.m.Y',
    ];
    protected $fillable = [
        'name',
        'desc',
        'reactor_id',
        'status',
        'count',
        'progress',
        'start',
        'finish'
    ];
}
