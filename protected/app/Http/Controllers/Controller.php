<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function datetotext($date){
        $datex = explode(" ", $date);
        $datetotext2 = explode("-", $datex[0]);
        return $datetotext2[2]."/".$datetotext2[1]."/".$datetotext2[0];
    }

    public function texttodate($date){
        $datex = explode(" ", $date);
        $datetotext2 = explode("/", $datex[0]);
        return $datetotext2[2]."-".$datetotext2[1]."-".$datetotext2[0];
    } 
}
