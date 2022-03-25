<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostCode;

class Address extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function PostCode(){
        return $this->hasOne(PostCode::class,"postcode","postcode");
    }
}
