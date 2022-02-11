<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductGroup;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function ProductGroup(){

        return $this->hasOne(ProductGroup::class,"id","groupid");

    }
}
