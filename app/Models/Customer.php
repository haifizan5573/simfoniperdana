<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;
use App\Models\Address;
use App\Models\Employer;
use App\Models\FileUpload;

class Customer extends Model
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

    public function Loan(){
        return $this->hasMany(Loan::class,"customerid","id");
    }

    public function Employer(){
        return $this->hasOne(Employer::class,"id","employerid");
    }

    public function Payslip(){
        return $this->morphMany(Payslip::class,"payslipsable");
    }

    public function FileUploads(){
        return $this->morphMany(FileUpload::class,"file_uploadsable");
    }
}
