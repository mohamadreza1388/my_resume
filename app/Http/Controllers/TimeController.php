<?php

namespace App\Http\Controllers;

use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function getTime()
    {
        Verta::setLocale('fa');
        $time = verta()->formatJalaliDatetime();
        return response()->json(['time' => $time]);
    }
}
