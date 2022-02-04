<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class menugroup extends Model
{
    use HasFactory;
    protected $table="menu_groups";
    protected $guarded=[];

    public function menu(){
        return $this->hasMany(Menu::class,"group_id","id");
    }
}
