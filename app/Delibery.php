<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delibery extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'code', 'register_date', 'delibery_date', 'destine', 'sale_id'
    ];
}
