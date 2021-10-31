<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();

        return view('backend.setting', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $this->validate($request, [
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'breadcrub_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {

            if (Storage::exists($setting->logo)) {
                Storage::delete($setting->logo);
            }
            
            $data['logo'] = $request->file('logo')->store('setting');
        }

        if ($request->hasFile('breadcrub_image')) {

            if (Storage::exists($setting->breadcrub_image)) {
                Storage::delete($setting->breadcrub_image);
            }
            
            $data['breadcrub_image'] = $request->file('breadcrub_image')->store('setting');
        }

        $setting->update($data);

        Alert::toast('Setting successfully updated', 'success');

        return redirect()->back();
    }
}
