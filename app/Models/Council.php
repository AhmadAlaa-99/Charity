<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Council extends Model
{

    protected $table = 'council_metting';
    public $timestamps = true;
    protected $guarded=[''];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
