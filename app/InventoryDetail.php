<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryDetail extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'previous_stock', 'new_stock', 'product_id', 'inventory_cuts_id'
    ];
}
