<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CT_HoaDon extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function invoice(){
        return $this->belongsTo('App\Models\HoaDon');
    }
}
