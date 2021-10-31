<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\ClientRequirement;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ClientRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientRequirements = ClientRequirement::query();

        if ($request->searchKeyword) {
            $clientRequirements->where('client_name',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('email',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('contact_number',  'LIKE', "%$request->searchKeyword%");
        }

        $clientRequirements = $clientRequirements->orderBy('client_name')->paginate(10);

        return view('backend.client_requirement.index', compact('clientRequirements'));
    }

    /**
     * Update the land owner status in reverse.
     *
     * @param  \App\Models\ClientRequirement  $clientRequirement
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(ClientRequirement $clientRequirement)
    {
        $clientRequirement->status = $clientRequirement->status;
        $clientRequirement->save();

        Alert::toast('Status successfully updated', 'success');

        return redirect()->back();
    }
}
