<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $skills = Cache::remember("skills", 24 * 60, function () {
            return Skill::all();
        });

        return view('index',compact('skills'));
    }
}
