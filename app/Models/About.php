<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{

    protected $table = 'about_us';
    public $timestamps = true;
    protected $guarded=[''];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
