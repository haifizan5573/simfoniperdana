<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Team extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table="teams";

    public function User()
    {
        return $this->belongsToMany(User::class,'team_users')->withTimestamps();
    }
}
