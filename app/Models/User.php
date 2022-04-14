<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Label;
use App\Models\Team;
use App\Models\Team_User;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Remark(){
        return $this->morphMany(Remark::class,'remarkable');
    }

    public function Label(){
        return $this->hasOne(Label::class,"typeid","isactive");
    }


    public function Contacts(){
        return $this->morphMany(Contact::class,'contactable');
    }

    public function Addresses(){
        return $this->morphMany(Address::class,'addressable');
    }

    public function FileUploads(){
        return $this->morphMany(FileUpload::class,"file_uploadsable");
    }

    public function Team()
    {
        
        return $this->belongsToMany(Team::class,'team_users');
    }
}
