<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReactorLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'reactor_id',
        'action',
        'prev',
        'now',
        'constant'
    ];
}
