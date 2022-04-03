<?php

namespace App\Models;
use App\Models\Activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;
 
    public function Surau(){

        return $this->hasMany(Activity::class,"category","id")->orderBy('start_date');

    }
}
