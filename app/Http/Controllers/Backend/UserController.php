<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->searchKeyword) {
            $users->where('name',  'LIKE', "%$request->searchKeyword%");
            $users->orWhere('email',  'LIKE', "%$request->searchKeyword%");
            $users->orWhere('mobile',  'LIKE', "%$request->searchKeyword%");
        }

        $users = $users->paginate(10);

        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'mobile' => 'required|unique:users',
            'photo' => 'mimes:jpeg,bmp,png,jpg'
        ]);

        $user = new User;

        if ($request->hasFile('photo')) {
            $user->photo = $request->file('photo')->store('user');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->save();

        Alert::toast('User successfully created', 'success');

        return redirect()->route('admin.user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = User::find(auth()->id());

        return view('backend.user.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'mobile' => 'required|max:20|unique:users,mobile,' . $user->id,
            'photo' => 'image|mimes:jpeg,bmp,png,jpg'
        ]);

        if ($request->hasFile('photo')) {
            if (Storage::exists($user->photo)) {
                Storage::delete($user->photo);
            }

            $user->photo = $request->file('photo')->store('user');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->save();

        Alert::toast('User successfully updated', 'success');

        return redirect()->route('admin.user.index');
    }

    /**
     * Update user profile
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $user = User::find(auth()->id());

        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'mobile' => 'required|max:20|unique:users,mobile,' . $user->id,
            'photo' => 'image|mimes:jpeg,bmp,png,jpg'
        ]);

        if ($request->hasFile('photo')) {
            if (Storage::exists($user->photo)) {
                Storage::delete($user->photo);
            }

            $user->photo = $request->file('photo')->store('user');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->save();

        Alert::toast('Your profile successfully Updated', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Storage::exists($user->photo)) {
            Storage::delete($user->photo);
        }

        $user->delete();

        Alert::toast('User successfully deleted', 'success');

        return redirect()->back();
    }
}
