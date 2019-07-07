<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_Detail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'description', 'quantity', 'subtotal'];

}
