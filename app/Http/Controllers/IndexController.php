<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\WorkSample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $skills = Cache::remember('skills', 24 * 60, function () {
            return Skill::all();
        });

        $work_samples = Cache::remember('work_samples', 24 * 60, function () {
            return WorkSample::all();
        });

        return view('index', compact('skills', 'work_samples'));
    }
}
