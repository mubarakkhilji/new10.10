<?php

namespace App\Http\Controllers\Backend;

use App\Models\LandOwner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LandOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $landOwners = LandOwner::query();

        if ($request->searchKeyword) {
            $landOwners->where('name',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('email',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('contact_number',  'LIKE', "%$request->searchKeyword%");
        }

        $landOwners = $landOwners->orderBy('name')->paginate(10);

        return view('backend.land_owner.index', compact('landOwners'));
    }

    /**
     * Update the land owner status in reverse.
     *
     * @param  \App\Models\LandOwner  $landOwner
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(LandOwner $landOwner)
    {
        $status = $landOwner->status;
        $landOwner->status = $status;
        $landOwner->save();

        Alert::toast('Status successfully updated', 'success');

        return redirect()->back();
    }
}
