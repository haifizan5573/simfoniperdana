<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Label;
use App\Models\FormUser;
class Form extends Model
{
    use HasFactory;
    protected $guarded=[];

  

    public function label(){

        return $this->hasOne(Label::Class,"id","status");
    }

    public function formuser(){

        return $this->hasMany(FormUser::Class,"formid","id");
    }

    public function isregistered($uid,$formid){

        return FormUser::where('userid',$uid)->where('formid',$formid)->count();
    }
 
}
