<?php

namespace App\Http\Controllers\Frontend;

use App\Models\News;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Setting;

class HomeController extends Controller
{
    /**
     * Show website home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $testimonials = Testimonial::active()->latest()->get();
        $whyChooseUs = WhyChooseUs::active()->latest()->take(6)->get();
        $news = News::active()->latest()->take(3)->get();
        $events = Event::active()->latest()->take(3)->get();
        $sliders = Slider::active()->latest()->take(6)->get();
        $projects = Project::with('type')->published()->whereIsFeatured(true)->orwhere('is_best', true)->latest()->take(9)->get();
        $settings = Setting::first();

        return view('frontend.pages.home', compact('testimonials', 'whyChooseUs', 'news', 'events', 'sliders', 'projects', 'settings'));
    }
}
