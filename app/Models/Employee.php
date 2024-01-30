<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{

    protected $table = 'employees';
    public $timestamps = true;
    protected $guarded=[''];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class,'nationality_id');
    }
}
