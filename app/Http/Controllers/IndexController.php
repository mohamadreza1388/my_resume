<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Skill;
use App\Models\WorkSample;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $skills = Skill::all();

        $work_samples = WorkSample::all();

        global $response;
        try {
            $token = env("GITHUB_TOKEN");

            $response = Http::withHeaders(['Authorization' => 'token ' . $token,])->get('https://api.github.com/users/mohamadreza1388');
            global $avatar;

            if ($response->successful()) {
                $avatar = $response->json('avatar_url');
                Setting::where('key', 'main_picture')->first()->update(['value' => $avatar,]);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        return view('index', compact('skills', 'work_samples'));
    }
}
