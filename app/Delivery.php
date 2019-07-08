<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'code', 'register_date', 'delivery_date', 'destine', 'sale_id'
    ];
}
