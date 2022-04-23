<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundUser extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){

        return $this->hasOne(User::Class,"id","userid");
    }
    
    public function Contacts(){
        return $this->morphMany(Contact::class,'contactable');
    }

    public function Addresses(){
        return $this->hasOne(Address::class,'addressable_id','userid');
    }
}
