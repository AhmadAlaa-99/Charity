<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{

    protected $table = 'partners';
    public $timestamps = true;
    protected $guarded=[''];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
