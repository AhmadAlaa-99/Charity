<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\About;
use App\Models\Event;
use App\Models\Image;
use App\Models\Slide;
use App\Models\umrah;
use App\Models\Video;
use App\Models\Partner;
use App\Models\Project;
use App\Models\muamtari;
use App\Models\Governance;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function welcome()
    {

        $partners = Partner::get();
        $news = News::where('is_publish', '1')->take('3')->get();
        $sliders = Slide::where('is_publish', '1')->get();
        $charity = About::first();
        $projects = Project::get();
        $events = Event::take('4')->get();
        $videos = Video::get();
        $gallery = Image::get();
        $governances = Governance::take('4')->get();
        $nationalities = Nationality::get();
        return view('Home.welcome', compact('partners', 'sliders', 'news', 'charity', 'projects', 'events', 'videos', 'gallery', 'governances', 'nationalities'));
    }
    public function contact_us()
    {
        $charity = About::first();
        return view('Home.contact_us', compact('charity'));
    }
    public function projects()
    {
        $charity = About::first();
        $projects = Project::get();
        return view('Home.projects', compact('projects', 'charity'));
    }

    public function events()
    {
        $charity = About::first();
        $events = Event::get();
        return view('Home.events', compact('events', 'charity'));
    }
    public function news()
    {
        $charity = About::first();
        return redirect()->back();
    }
    public function images()
    {
        return redirect()->back();
    }
    public function channel()
    {
        $charity = About::first();
        return redirect()->back();
    }
    public function about_us()
    {
        $charity = About::first();
        $events = Event::get();
        return view('Home.about_us', compact('charity', 'events'));
    }
    public function project_details($id)
    {
        $charity = About::first();
        $project = Project::where('id', $id)->first();
        return view('Home.project_details', compact('project', 'charity'));
    }
    public function governances()
    {
        $governances = Governance::get();
        return view('Home.governances', compact('governances'));
    }
    public function umrah_request(Request $request)
    {
        $request->validate([
            // 'name' => 'required|string',
            // 'number' => 'required|string',
            // 'gender' => 'required|in:ذكر,أنثى',
            // 'nationality_id' => 'required|exists:nationalities,id',
            // 'last' => 'required|date',
            // 'birth_date' => 'required|date',
            // 'members' => 'required|integer',
        ]);

        muamtari::create($request->all());
         // إضافة رسالة الجلسة
    Session::flash('success', 'تم التسجيل بنجاح!');

    // إعادة التوجيه إلى الصفحة نفسها مع المرساة #umrah-form
    return redirect()->to(url()->previous() . '#umrah-form');
    }
    public function download_go($id)
    {
        $governance = Governance::findOrFail($id);
        $documentionName = basename($governance->documention);

        $filePath = 'public/documentions_go/' . $documentionName;
        if (!Storage::exists($filePath)) {
            return redirect()->back()->with('error', 'File not found.');
        }
        $absolutePath = Storage::path($filePath);
        $headers = ['Content-Type' => Storage::mimeType($filePath)];
        return response()->download($absolutePath, $documentionName, $headers);
    }
    public function download_pro($id)
    {
        $project = Project::findOrFail($id);
        $documentionName = basename($project->documention);

        $filePath = 'public/documentions_pro/' . $documentionName;
        if (!Storage::exists($filePath)) {
            return redirect()->back()->with('error', 'File not found.');
        }
        $absolutePath = Storage::path($filePath);
        $headers = ['Content-Type' => Storage::mimeType($filePath)];
        return response()->download($absolutePath, $documentionName, $headers);
    }
}
