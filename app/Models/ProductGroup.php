<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Label;

class ProductGroup extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Products(){

        return $this->hasMany(Product::class,"groupid","id");
    }

    public function Status(){
        return $this->hasOne(Label::class,"id","isactive");
    }
}
