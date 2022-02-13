<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Remark;

class Loan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Remark(){
        return $this->morphMany(Remark::class,'remarkable');
    }
}
