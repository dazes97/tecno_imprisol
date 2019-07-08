<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CountPage extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id', 'case_use', 'count'
    ];
}
