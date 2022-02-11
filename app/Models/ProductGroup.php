<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductGroup extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Products(){

        return $this->hasMany(Product::class,"groupid","id");
    }
}
