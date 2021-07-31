<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'work_id',
        'reactor_id',
        'action',
        'prev',
        'now',
        'constant'
    ];
}
