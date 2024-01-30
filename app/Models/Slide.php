<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{

    protected $table = 'sliders';
    public $timestamps = true;
    protected $guarded=[''];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
