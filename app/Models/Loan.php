<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Remark;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Status;

class Loan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Remarks(){
        return $this->morphMany(Remark::class,'remarkable');
    }

    public function Customer(){
        return $this->hasOne(Customer::class,'id','customerid');
    }

    public function Product(){
        return $this->hasOne(Product::class,'id','productid');
    }

    public function Status(){
        return $this->hasOne(Status::class,'id','status');
    }
}
