<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\About;
use App\Models\Event;
use App\Models\Image;
use App\Models\Slide;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Video;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {

        $partners=Partner::get();
        $news=News::where('is_publish','1')->get();
        $sliders=Slide::where('is_publish', '1')->get();
        $charity = About::first();
        $projects=Project::get();
        $events=Event::get();
        $videos=Video::get();
        $gallery=Image::get();
        return view('Home.welcome',compact('partners','sliders','news','charity','projects','events','videos','gallery'));
    }
    public function contact_us()
    {
        $charity = About::first();
        return view('Home.contact_us',compact('charity'));
    }
    public function projects()
    {
        $charity = About::first();
        $projects=Project::get();
        return view('Home.projects',compact('projects','charity'));
    }
    public function umrah_request(Request $request)
    {
        return redirect()->back();
    }
    public function events()
    {
        $charity = About::first();
        $events=Event::get();
        return view('Home.events',compact('events','charity'));
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
        return view('Home.about_us',compact('charity'));
    }
    public function project_details($id)
    {
        $charity = About::first();
        $project=Project::where('id',$id)->first();
        return view('Home.project_details',compact('project','charity'));
    }

}
