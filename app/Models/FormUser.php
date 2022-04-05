<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormUser extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Members(){
        return $this->morphMany(Member::class,'membersable');
    }

    public function FileUploads(){
        return $this->hasOne(FileUpload::class,'file_uploadsable_id','userid');
    }

    public function user(){

        return $this->hasOne(User::Class,"id","userid");
    }

    public function label(){

        return $this->hasOne(Label::Class,"id","status");
    }

    public function Contacts(){
        return $this->morphMany(Contact::class,'contactable');
    }

    public function Addresses(){
        return $this->hasOne(Address::class,'addressable_id','userid');
    }
}
