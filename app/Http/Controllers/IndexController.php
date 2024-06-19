<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\Background;
use App\Models\ExamplesOfWork;
use App\Models\File;
use App\Models\Image;
use App\Models\MenuItem;
use App\Models\SectionTitle;
use App\Models\Skill;
use App\Models\Text;
use App\Models\User;
use App\Models\Visit;
use App\Models\WayCommunication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        function visit_check()
        {
            if (request()->cookie("visit_status") === "visited") {

            } else {
                global $user_id;
                if (Auth::check()) {
                    $user_id = auth()->user()->id;
                } else {
                    $user_id = null;
                }
                Visit::create([
                    "user_id" => $user_id
                ]);
                cookie()->queue(cookie("visit_status","visited",60,"/"));
            }
        }
        visit_check();

        $main_bg = Background::where("title", "main-bg")->get();
        $logo1 = Image::where("title", "logo1")->first()->img_src;
        $name = Text::where('title', "name")->first()->content;
        $main_description = Text::where('title', "main_description")->first()->content;
        $resume_file = File::where("title", "resume_pdf_file")->first()->url_address;
        $main_communications = WayCommunication::where("at", "main")->get();
        $main_left_img = Image::where("title", "main-left-img")->first()->img_src;
        $mouse_img = Image::where("title", "mouse")->first()->img_src;
        $scroll_text = Text::where('title', "scroll_text")->first()->content;
        $paragraph1 = AboutMe::where("title", "paragraph1")->first()->content;
        $about_me_title = SectionTitle::where("belongs_to", "about-me")->first()->title;
        $skills_title = SectionTitle::where("belongs_to", "skills")->first()->title;
        $contact_us_title = SectionTitle::where("belongs_to", "contact-us")->first()->title;
        $work_samples_title = SectionTitle::where("belongs_to", "work-samples")->first()->title;
        $way_communications = WayCommunication::all();
        $skills = Skill::all();
        $menu_items = MenuItem::all();
        $work_samples = ExamplesOfWork::all();
        $copy_right = Text::where("title", "copy_right")->first()->content;
        return view("index",
            compact(
                "menu_items",
                "main_bg",
                "logo1",
                "name",
                "main_description",
                "resume_file",
                "main_communications",
                "mouse_img",
                "main_left_img",
                "scroll_text",
                "paragraph1",
                "about_me_title",
                "skills_title",
                "skills",
                "contact_us_title",
                "way_communications",
                "work_samples_title",
                "work_samples",
                "copy_right"
            ));
    }
}
