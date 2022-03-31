<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductGroup;
use App\Models\Label;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function ProductGroup(){

        return $this->hasOne(ProductGroup::class,"id","groupid");

    }

    public function Status(){
        return $this->hasOne(Label::class,"id","status");
    }

    public function Rates(){
        return $this->hasMany(ProductRate::class,"productid","id");
    }
}
