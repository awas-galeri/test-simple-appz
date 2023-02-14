<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index', [
            'title' => 'Profile',
            'active' => 'profile',
            // 'user' => Auth::user(),
            'users' => User::where('id', Auth::id())->get(),
        ]);
    }

    public function edit(Request $request)
    {
        User::where('id', $request->user()->id)->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        // $user = Auth::user();
        // $user->name     = $request->name;
        // $user->email    = $request->email;
        // $user->phone    = $request->phone;
        // $user->password = bcrypt($request->password);
        // $user->save();

        return redirect('profile')->with('success', 'Profile Updated!');
    }

    public function change_photo(Request $request)
    {
        $user   = User::find($request->user()->id);
        self::removePhotoFile($user);
        $request->validate([
            'photo' => 'required|max:2048|mimes:png,jpg,jpeg',
        ]);
        $avatar = $request->file('photo');
        $path   = $this->saveAvatar($user, $avatar);
        return [
            'path' => $path
        ];
    }

    public static function removePhotoFile(User $user): Bool
    {
        if ($user->photo != null) {
            $path = str_replace(url('/'), public_path(), $user->photo);
            if (file_exists($path)) {
                return File::delete($path);
            } else {
                return false;
            }
        }
        return false;
    }

    public static function saveAvatar(User $user, $streamImage): string
    {
        $path           = "user/avatar{$user->id}." . $streamImage->getClientOriginalExtension();
        $streamImage->move(public_path('user'), $path);
        $user->photo    = url($path);
        $user->save();
        return $user->photo;
    }
}
