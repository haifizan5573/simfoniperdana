<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function label(){

        return $this->hasOne(Label::Class,"id","status");
    }

    public function category(){

        return $this->hasOne(Label::Class,"id","category");
    }

    public function status(){

        return $this->hasOne(Label::Class,"id","status");
    }




}
