<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoaDon extends Model
{
    use HasFactory;
    use softDeletes;

    protected $guarded = [];
    public function CTHD(){
        return $this->hasMany('App\Models\CT_HoaDon');
    }

    
}
