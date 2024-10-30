<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Skill;
use App\Models\WorkSample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

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

        $response = Http::get("https://api.github.com/users/mohamadreza1388");
        global $avatar;
        if ($response->successful()) {
            $avatar = $response->json("avatar_url");
        }
        Setting::where("key", "main_picture")->first()->update([
           "value" => $avatar
        ]);

        return view('index', compact('skills', 'work_samples'));
    }
}
