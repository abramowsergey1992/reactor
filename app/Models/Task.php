<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
      protected $dates = [
        'date',
    ];



    protected $casts = [
        'date' => 'datetime:dd.mm.yyyy',
    ];
    protected $fillable = [
        'work_id',
        'date',
        'user_id',
        'status',
        'specialization'
    ];
}
