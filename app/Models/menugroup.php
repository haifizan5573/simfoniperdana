<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menugroup extends Model
{
    use HasFactory;
    protected $table="menu_groups";
    protected $guarded=[];
}
