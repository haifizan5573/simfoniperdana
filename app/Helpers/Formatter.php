<?php


namespace App\Helpers;
use Carbon\Carbon;

class Formatter
{



    public function formatAddress($address){

        $fulladd="";

        if(!empty($address->address)){
            $fulladd.=nl2br($address->address)."<br/>";
        }

        if(!empty($address->location)){
            $fulladd.=$address->location."<br/>";
        }

        if(!empty($address->postcode)){
            $fulladd.=$address->postcode.", ".$address->PostCode->state;
        }

        return "<div style=\"margin-top: -20px!important; margin-left: 6px !important\">".$fulladd."</div>";
    }

    public function formatDate($date){

        return Carbon::createFromFormat('d M, Y',$date)->format('Y-m-d');
    }

    public function formatDate2($date){

        return Carbon::createFromFormat('Y-m-d H:i:s',$date)->format('d M, Y');
    }

 

    public function formatIC($icnumber){
       
        $icnumber= preg_replace('/[^0-9]+/', '', $icnumber);
        $icnumber = substr($icnumber, 0, 12);
        $length = strlen($icnumber);
        $formatted = "";
        for ($i = 0; $i < $length; $i++) { 
            $formatted .= $icnumber[$i];
            if($i == 5 || $i == 7){
                $formatted .= "-";
            }
        }
        return $formatted;
    }

    public static function generateCode($number,$initial){

      
        if(strlen($number)<=4){
            return $initial.str_pad($number,4, '0', STR_PAD_LEFT);
        }
        
        return $initial.$number;
        
        
        
    }


}