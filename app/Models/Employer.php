<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $dateFormat = 'd M, Y';

    public function Contacts(){
        return $this->morphMany(Contact::class,'contactable');
    }

    public function Addresses(){
        return $this->morphMany(Address::class,'addressable');
    }
}
