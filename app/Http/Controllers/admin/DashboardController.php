<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutMe;
use App\Models\Development;
use App\Models\ExamplesOfWork;
use App\Models\File;
use App\Models\Gender;
use App\Models\Image;
use App\Models\Link;
use App\Models\Skill;
use App\Models\Text;
use App\Models\User;
use App\Models\Visit;
use App\Models\WayCommunication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $directory = public_path('user_file');
        $files = \Illuminate\Support\Facades\File::files($directory);

        $fileNames = [];
        foreach ($files as $file) {
            $fileNames[] = $file->getFilename();
        }

        $visit_status = [];
        for ($i = 0; $i <= 10; $i++) {
            $visit_status[$i] = count(Visit::whereDate('created_at', Carbon::now()->subDays($i)->toDateString())->get());
        }
        $user_status = [];
        for ($i = 0; $i <= 10; $i++) {
            $user_status[$i] = count(User::whereDate('created_at', Carbon::now()->subDays($i)->toDateString())->get());
        }
        $users = User::all();
        $userCount = count(User::all());
        $skillsCount = count(Skill::all());
        $communicationCount = count(WayCommunication::all());
        $workSampleCount = count(ExamplesOfWork::all());
        $skills = Skill::all();
        $ways_communication = WayCommunication::all();
        $links = Link::all();
        $developments = Development::all();
        $workSamples = ExamplesOfWork::all();
        $about_text = AboutMe::where("title", "paragraph1")->first()->content;
        $name = Text::where("title", "name")->first()->content;
        $description = Text::where("title", "main_description")->first()->content;
        $copy_right = Text::where("title", "copy_right")->first()->content;
        $img_address = Image::where("title", "main-left-img")->first()->img_src;
        $resume_address = File::where("title", "resume_pdf_file")->first()->url_address;
//        $logo1 = Image::where("title","logo1")->first()->img_src;
        return view("admin.dashboard", compact(
            "userCount",
            "skillsCount",
            'communicationCount',
            "workSampleCount",
            "visit_status",
            "user_status",
            "users",
            "skills",
            "ways_communication",
            "links",
            "developments",
            "workSamples",
            "about_text",
            "name",
            "description",
            "copy_right",
            "img_address",
            "resume_address",
            "fileNames"
        ));
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return back();
    }

    public function edit($id)
    {
        $genders = Gender::all();
        $user = User::findOrFail($id);
        return view("admin.user.edit", compact("user", "genders"));
    }

    public function update($id)
    {
        $validate = Validator::make(request()->all(), [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            "gender" => ["required", "numeric", "min:1", "max:5"]
        ])->validated();

        $user = User::findOrFail($id);
        if ($user->email === $validate["email"]) {

        } else {
            $user->update([
                "email_verified_at" => null
            ]);
        }
        if ($validate["gender"] == 1) {
            $user->update([
                "avatar" => Image::where("title", "man-avatar")->first()->img_src
            ]);
        } elseif ($validate["gender"] == 2) {
            $user->update([
                "avatar" => Image::where("title", "woman-avatar")->first()->img_src
            ]);
        }
        $user->update([
            "name" => $validate["name"],
            "last_name" => $validate["last_name"],
            "email" => $validate["email"],
            "gender_id" => $validate["gender"],
        ]);
        return redirect("admin/dashboard");
    }

    public function viewAccount($id)
    {
        $user = User::findOrFail($id);
        Auth::login($user);
        return redirect("/");
    }

    public function createView()
    {
        $genders = Gender::all();
        return view("admin.user.create", compact("genders"));
    }

    public function create()
    {
        $validate = Validator::make(request()->all(), [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            "gender" => ["required", "numeric", "min:1", "max:5"]
        ])->validated();
        User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            "last_name" => $validate["last_name"],
            'password' => Hash::make($validate['password']),
            "gender_id" => $validate["gender"]
        ]);
        foreach (User::all() as $user) {
            $user_gender = $user->gender_id;
            if ($user_gender === 1) {
                if (is_null($user->avatar)) {
                    $user->update([
                        "avatar" => Image::where("title", "man-avatar")->first()->img_src
                    ]);
                }
            } elseif ($user_gender === 2) {
                if (is_null($user->avatar)) {
                    $user->update([
                        "avatar" => Image::where("title", "woman-avatar")->first()->img_src
                    ]);
                }
            }
        }
        return redirect("/admin/dashboard");
    }


    public function skillDelete($id)
    {
        Skill::findOrFail($id)->delete();
        return back();
    }

    public function skillEdit($id)
    {
        $skill = Skill::findOrFail($id);
        return view("admin.skill.edit", compact("skill"));
    }

    public function skillUpdate($id)
    {
        $validate = Validator::make(request()->all(), [
            'title' => ['required', 'string', 'max:255'],
            'max' => ['required', "numeric", 'max:255'],
            'value' => ['required', 'numeric', 'max:255']
        ])->validated();
        $skill = Skill::findOrFail($id);
        $skill->update([
            "title" => $validate["title"],
            "max" => $validate["max"],
            "value" => $validate["value"],
        ]);
        return redirect("admin/dashboard");
    }

    public function skillCreateView()
    {
        return view("admin.skill.create");
    }

    public function skillCreate()
    {
        $validate = Validator::make(request()->all(), [
            'title' => ['required', 'string', 'max:255'],
            'max' => ['required', "numeric", 'max:255'],
            'value' => ['required', 'numeric', 'max:255']
        ])->validated();
        Skill::create([
            "title" => $validate["title"],
            "max" => $validate["max"],
            "value" => $validate["value"],
        ]);
        return redirect("admin/dashboard");
    }


    public function wayCommunicationDelete($id)
    {
        WayCommunication::findOrFail($id)->delete();
        return back();
    }

    public function wayCommunicationEdit($id)
    {
        $wayCommunication = WayCommunication::findOrFail($id);
        $links = Link::all();
        return view("admin.way_communication.edit", compact("wayCommunication", "links"));
    }

    public function wayCommunicationUpdate($id)
    {
        $validate = Validator::make(request()->all(), [
            'imgSrc' => ['required', 'string', 'max:255'],
            'title' => ['required', "string", 'max:255'],
            'platformName' => ['required', 'string', 'max:255'],
            'link' => ['required', 'numeric', 'max:255'],
            'tooltip' => ["nullable", 'string', 'max:255'],
            'fontIcon' => ["nullable", 'string', 'max:255'],
            'at' => ["nullable", 'string', 'max:255'],
        ])->validated();
        $wayCommunication = WayCommunication::findOrFail($id);
        $wayCommunication->update([
            "img_src" => $validate["imgSrc"],
            "tooltip" => $validate["tooltip"],
            "font_icon_class" => $validate["fontIcon"],
            "title" => $validate["title"],
            "link_id" => $validate["link"],
            "platform_name" => $validate["platformName"],
            "at" => $validate["at"]
        ]);
        return redirect("admin/dashboard");
    }

    public function wayCommunicationCreateView()
    {
        $links = Link::all();
        return view("admin.way_communication.create", compact("links"));
    }

    public function wayCommunicationCreate()
    {
        $validate = Validator::make(request()->all(), [
            'imgSrc' => ['required', 'string', 'max:255'],
            'title' => ['required', "string", 'max:255'],
            'platformName' => ['required', 'string', 'max:255'],
            'link' => ['required', 'numeric', 'max:255'],
            'tooltip' => ["nullable", 'string', 'max:255'],
            'fontIcon' => ["nullable", 'string', 'max:255'],
            'at' => ["nullable", 'string', 'max:255'],
        ])->validated();
        WayCommunication::create([
            "img_src" => $validate["imgSrc"],
            "tooltip" => $validate["tooltip"],
            "font_icon_class" => $validate["fontIcon"],
            "title" => $validate["title"],
            "link_id" => $validate["link"],
            "platform_name" => $validate["platformName"],
            "at" => $validate["at"]
        ]);
        return redirect("admin/dashboard");
    }


    public function linkDelete($id)
    {
        Link::findOrFail($id)->delete();
        return back();
    }

    public function linkEdit($id)
    {
        $link = Link::findOrFail($id);
        return view("admin.link.edit", compact("link"));
    }

    public function linkUpdate($id)
    {
        $validate = Validator::make(request()->all(), [
            'title' => ['required', 'string', 'max:255'],
            'link' => ['required', "string", 'max:255']
        ])->validated();
        $link = Link::findOrFail($id);
        $link->update([
            "title" => $validate["title"],
            "link" => $validate["link"]
        ]);
        return redirect("admin/dashboard");
    }

    public function linkCreateView()
    {
        return view("admin.link.create");
    }

    public function linkCreate()
    {
        $validate = Validator::make(request()->all(), [
            'title' => ['required', 'string', 'max:255'],
            'link' => ['required', "string", 'max:255']
        ])->validated();
        Link::create([
            "title" => $validate["title"],
            "link" => $validate["link"]
        ]);
        return redirect("admin/dashboard");
    }


    public function developmentDelete($id)
    {
        Development::findOrFail($id)->delete();
        return back();
    }

    public function developmentEdit($id)
    {
        $development = Development::findOrFail($id);
        return view("admin.development.edit", compact("development"));
    }

    public function developmentUpdate($id)
    {
        $validate = Validator::make(request()->all(), [
            'name' => ['required', 'string', 'max:255']
        ])->validated();
        $development = Development::findOrFail($id);
        $development->update([
            "name" => $validate["name"]
        ]);
        return redirect("admin/dashboard");
    }

    public function developmentCreateView()
    {
        return view("admin.development.create");
    }

    public function developmentCreate()
    {
        $validate = Validator::make(request()->all(), [
            'name' => ['required', 'string', 'max:255'],
        ])->validated();
        Development::create([
            "name" => $validate["name"],
        ]);
        return redirect("admin/dashboard");
    }


    public function workSampleDelete($id)
    {
        ExamplesOfWork::findOrFail($id)->delete();
        return back();
    }

    public function workSampleEdit($id)
    {
        $developments = Development::all();
        $work_sample = ExamplesOfWork::findOrFail($id);
        return view("admin.work_sample.edit", compact("developments", "work_sample"));
    }

    public function workSampleUpdate($id)
    {
        $validate = Validator::make(request()->all(), [
            'title' => ['required', 'string', 'max:255'],
            'subTitle' => ['required', 'string', 'max:255'],
            'imgSrc' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
            'development' => ['required', 'array', 'max:255']
        ])->validated();
        $work_sample = ExamplesOfWork::findOrFail($id);
        $work_sample->update([
            "work_title" => $validate["title"],
            "information_title" => $validate["subTitle"],
            "img_src" => $validate["imgSrc"],
            "url_address" => $validate["link"],
        ]);
        $work_sample->developments()->sync($validate["development"]);
        return redirect("admin/dashboard");
    }

    public function workSampleCreateView()
    {
        $developments = Development::all();
        return view("admin.work_sample.create", compact("developments"));
    }

    public function workSampleCreate()
    {
        $validate = Validator::make(request()->all(), [
            'title' => ['required', 'string', 'max:255'],
            'subTitle' => ['required', 'string', 'max:255'],
            'imgSrc' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
            'development' => ['required', 'array', 'max:255']
        ])->validated();
        ExamplesOfWork::create([
            "work_title" => $validate["title"],
            "information_title" => $validate["subTitle"],
            "img_src" => $validate["imgSrc"],
            "url_address" => $validate["link"],
        ]);
        $work_sample = ExamplesOfWork::latest()->first();
        for ($i = 0; $i < count($validate["development"]); $i++) {
            $work_sample->developments()->attach($validate["development"][$i]);
        }
        return redirect("admin/dashboard");
    }

    public function about_me()
    {
        $data = Validator::make(request()->all(), [
            "about_text" => ["required", "string"]
        ])->validated();
        $about = AboutMe::where("title", "paragraph1")->first();
        $about->update([
            "content" => $data["about_text"]
        ]);
        return back();
    }

    public function name()
    {
        $data = Validator::make(request()->all(), [
            "name" => ["required", "string", "max:255"]
        ])->validated();
        $name = Text::where("title", "name")->first();
        $name->update([
            "content" => $data["name"]
        ]);
        return back();
    }

    public function description()
    {
        $data = Validator::make(request()->all(), [
            "description" => ["required", "string", "max:255"]
        ])->validated();
        $description = Text::where("title", "main_description")->first();
        $description->update([
            "content" => $data["description"]
        ]);
        return back();
    }

    public function copy_right()
    {
        $data = Validator::make(request()->all(), [
            "copy_right" => ["required", "string", "max:255"]
        ])->validated();
        $description = Text::where("title", "copy_right")->first();
        $description->update([
            "content" => $data["copy_right"]
        ]);
        return back();
    }

    public function main_left_img()
    {
        $data = Validator::make(request()->all(), [
            "img_address" => ["required", "string"]
        ])->validated();
        $description = Image::where("title", "main-left-img")->first();
        $description->update([
            "img_src" => $data["img_address"]
        ]);
        return back();
    }

    public function resume_file()
    {
        $data = Validator::make(request()->all(), [
            "resume_address" => ["required", "string"]
        ])->validated();
        $description = File::where("title", "resume_pdf_file")->first();
        $description->update([
            "url_address" => $data["resume_address"]
        ]);
        return back();
    }

    public function add_user_file()
    {
        $data = Validator::make(request()->file(), [
            "file" => ["required", "file", "max:2048"]
        ])->validated();

        $file = $data["file"];
        $file->move(public_path("user_file"),$file->getClientOriginalName());
        return back();

    }


}
