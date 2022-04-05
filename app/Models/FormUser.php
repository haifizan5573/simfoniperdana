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
}
