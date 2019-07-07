<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'code', 'date', 'description', 'total_amount'];

    public function order_details()
    {
        return $this->hasMany('App\Order_Detail');
    }

}
