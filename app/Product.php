<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'code', 'brand', 'model', 'purchase_price', 'sale_cost', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
