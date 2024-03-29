<?php

namespace App\Models;

use App\Models\User;
use App\Models\Khairat;
use App\Models\Label;
use App\Models\FileUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhairatUser extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){

        return $this->hasOne(User::Class,"id","userid");
    }

    public function label(){

        return $this->hasOne(Label::Class,"id","status");
    }

    public function membership(){

        return $this->hasOne(Label::Class,"id","membership");
    }

    public function khairat(){

        return $this->hasOne(Khairat::Class,"id","khairat");
    }

    public function Contacts(){
        return $this->morphMany(Contact::class,'contactable');
    }

    public function Addresses(){
        return $this->hasOne(Address::class,'addressable_id','userid');
    }

    public function FileUpload(){
        return $this->hasOne(FileUpload::class,'file_uploadsable_id','userid');
    }
}
