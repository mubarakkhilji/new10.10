<?php

namespace App\Http\Controllers\Backend;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $feedbacks = Feedback::query();

        if ($request->searchKeyword) {
            $feedbacks->where('name',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('email',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('contact_number',  'LIKE', "%$request->searchKeyword%");
        }

        $feedbacks = $feedbacks->orderBy('name')->paginate(10);

        return view('backend.feedback.index', compact('feedbacks'));
    }

    /**
     * Update the visitor feedback status in reverse.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Feedback $feedback)
    {
        $status = $feedback->status;
        $feedback->status = $status;
        $feedback->save();

        Alert::toast('Status successfully updated', 'success');

        return redirect()->back();
    }
}
