<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryCut extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'description', 'date', 'administrative_id'
    ];
}
