<?php

namespace App\Http\View\Composers;

use App\Models\Blog;
use App\Models\News;
use App\Models\Type;
use App\Models\Event;
use App\Models\AboutUs;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\View\View;

class AppComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $settings = Setting::first();
        $footerProjects = Project::whereIsFeatured(true)->latest()->take(4)->get();
        $footerNews = News::active()->latest()->take(4)->get();
        $footerEvents = Event::active()->latest()->take(4)->get();
        $footerBlogs = Blog::active()->latest()->take(4)->get();
        $types = Type::active()->latest()->get();
        $aboutUs = AboutUs::active()->latest()->get();

        $view->with(['settings' => $settings, 'footerProjects' => $footerProjects, 'footerNews' => $footerNews, 'footerEvents' => $footerEvents, 'footerBlogs' => $footerBlogs, 'types' => $types, 'aboutUs' => $aboutUs]);
    }
}