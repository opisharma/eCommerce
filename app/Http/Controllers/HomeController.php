<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard/home',);
    }

    public function profile()
    {
        return view('dashboard/profile',);
    }

    public function changename(Request $request)
    {
        $old_name = auth()->user()->name;
        User::find(auth()->user()->id)->update([
            'name' => $request->name
        ]);
        return redirect('profile#name_change')->with('success', "Your name changed from $old_name to $request->name successfully!");
    }
    public function changepassword(Request $request)
    {
        if (Hash::check($request->current_password, auth()->user()->password)) {
            if ($request->password == $request->password_confirmation) {
                user::find(auth()->id())->update([
                    'password' => bcrypt($request->password)
                ]);
                return redirect('profile#change_password')->with('p_success', 'New Password Set Successfully!');
            }
            else {
                return redirect('profile#change_password')->with('unmatched_pass', 'New Password & Confirm New Password Does not Matched');
            }
        }
        else {
            return redirect('profile#change_password')->with('unmatched_current_pass', 'Current Password is wrong');
        }
    }

    public function changephoto(Request $request)
    {
        // delete old photo
        if(auth()->user()->profile_photo != "default-photo.png"){
            $deleted_link = base_path('public/uploads/profile_photos/'. auth()->user()->profile_photo);
            unlink($deleted_link);
        }
        // store the photo in a variable
        $profile_photo = $request->file('profile_photo');
        // create neew name of the photo
        $new_name = Str::slug(auth()->user()->name)."-". auth()->id().".". $profile_photo->getClientOriginalExtension();
        // create new upload link
        $link = base_path('public/uploads/profile_photos/'. $new_name);
        // upload via image intervention
        Image::make($profile_photo)->resize(196, 196)->save($link);
        // update to the database
        User::find(auth()->id())->update([
            'profile_photo' => $new_name
        ]);
        return redirect('profile#profile_upload')->with('profile_success', 'Profile Photo Uploaded successfully!');
    }

    public function deletemessage($id)
    {
        contact::find($id)->delete();
        return back();
    }


    public function messages()
    {
        $contacts = contact::orderBy('status', 'desc')->latest()->get();
        return view('dashboard/messages', compact('contacts'));
    }

    public function readmessage($id)
    {
        contact::find($id)->update([
            'status' => 'read'
        ]);
        return back();
    }
}

