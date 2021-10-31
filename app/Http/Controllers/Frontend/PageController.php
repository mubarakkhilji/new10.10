<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\News;
use App\Models\Type;
use App\Models\Event;
use App\Models\Career;
use App\Models\AboutUs;
use App\Models\Booking;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\LandOwner;
use Illuminate\Http\Request;
use App\Models\ClientRequirement;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        $settings = Setting::first();
        $media = News::active()->latest()->get();
        $title = 'News';

        return view('frontend.pages.media', compact('media', 'title', 'settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function event()
    {
        $settings = Setting::first();
        $media = Event::active()->latest()->get();
        $title = 'Event';

        return view('frontend.pages.media', compact('media', 'title', 'settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        $settings = Setting::first();
        $media = Blog::active()->latest()->get();
        $title = 'Blog';

        return view('frontend.pages.media', compact('media', 'title', 'settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newsDetails($id)
    {   
        $settings = Setting::first(); 
        $media = News::find($id);
        $title = 'News';

        return view('frontend.pages.media-details', compact('media', 'title', 'settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventDetails($id)
    {
        $settings = Setting::first();
        $media = Event::find($id);
        $title = 'Event';

        return view('frontend.pages.media-details', compact('media', 'title', 'settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogDetails($id)
    {
        $settings = Setting::first();
        $media = Blog::find($id);
        $title = 'Blog';

        return view('frontend.pages.media-details', compact('media', 'title', 'settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function project($id)
    {
        $settings = Setting::first();
        $type = Type::find($id);
        $categories = Category::active()->latest()->get();
        $projects = Project::with('category', 'type')->published()->where('type_id', $id)->latest()->get();

        return view('frontend.pages.project', compact('categories', 'projects', 'type', 'settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectBooking(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email',
            'contact_number' => 'required|max:20',
            'message' => 'required',
        ]);

        $booking = new Booking();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->contact_number = $request->contact_number;
        $booking->message = $request->message;
        $booking->save();

        return back()->with('message', 'Done! Thanks for booking');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectDetails($id)
    {
        $project = Project::find($id);

        return view('frontend.pages.project-details', compact('project'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function landOwner()
    {
        $settings = Setting::first();
        
        return view('frontend.pages.land-owner', compact('settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clientRequirements()
    {
        $settings = Setting::first();

        return view('frontend.pages.client-requirements', compact('settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUs()
    {
        $settings = Setting::first();

        return view('frontend.pages.contact-us', compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeContactUs(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email',
            'contact_number' => 'required|max:20',
            'message' => 'required',
        ]);

        $contactUs = new Feedback();
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->contact_number = $request->contact_number;
        $contactUs->subject = $request->subject;
        $contactUs->message = $request->message;
        $contactUs->save();

        return back()->with('message', 'Your message sent successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClientRequirement(Request $request)
    {
        $this->validate($request, [
            'client_name' => 'required|max:191',
            'bed_rooms' => 'required|max:191',
            'bath_rooms' => 'required|max:191',
            'email' => 'required|email',
            'contact_number' => 'required|max:20',
            'preferred_location' => 'required|max:191',
            'preferred_size' => 'required|max:191',
            'address' => 'required',
            'profession' => 'required|max:191',
        ]);

        $Property_amenities = $request->bad_rooms . ' ' . $request->bath_rooms;

        $clientRequirement = new ClientRequirement();
        $clientRequirement->client_name = $request->client_name;
        $clientRequirement->email = $request->email;
        $clientRequirement->contact_number = $request->contact_number;
        $clientRequirement->preferred_location = $request->preferred_location;
        $clientRequirement->preferred_size = $request->preferred_size;
        $clientRequirement->address = $request->address;
        $clientRequirement->Property_amenities = $Property_amenities;
        $clientRequirement->profession = $request->profession;
        $clientRequirement->save();

        return back()->with('message', 'Your requirement sent successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLandOwner(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email',
            'address' => 'required',
            'land_size' => 'required|max:191',
            'unit' => 'required|max:191',
            'contact_person' => 'required|max:191',
            'contact_address' => 'required',
            'contact_number' => 'required|max:191',
        ]);

        $land_size = $request->land_size . ' ' . $request->unit;

        $landOwner = new LandOwner();
        $landOwner->name = $request->name;
        $landOwner->email = $request->email;
        $landOwner->address = $request->address;
        $landOwner->land_size = $land_size;
        $landOwner->contact_person = $request->contact_person;
        $landOwner->contact_address	 = $request->contact_address;
        $landOwner->contact_number = $request->contact_number;
        $landOwner->save();

        return back()->with('message', 'Your request sent successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs($id)
    {
        $settings = Setting::first();
        $aboutUs = AboutUs::find($id);

        return view('frontend.pages.about-us', compact('aboutUs', 'settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function career()
    {
        $settings = Setting::first();
        $careers = Career::published()->get();

        return view('frontend.pages.career', compact('careers', 'settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function careerDetails($id)
    {
        $settings = Setting::first();
        $career = Career::find($id);

        return view('frontend.pages.career-details', compact('career', 'settings'));
    }
}
