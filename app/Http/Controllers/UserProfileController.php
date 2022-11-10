<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Services\{FileUploadService, ValidatorService};
use App\Models\{Profile, User};
use Illuminate\Support\Facades\{Hash, Auth};
use Illuminate\Http\{RedirectResponse, Request};

class UserProfileController extends Controller
{
    public function getProfileInfo() {
        return Profile::where('user_id', Auth::id())->first();
    }

    public function editProfile(Request $request): RedirectResponse {
        if ($request->hasFile('photo')) {
            $validate = ValidatorService::validate(
                $request->all(), ['photo' => 'image|mimes:jpg,png,jpeg']
            );
            if ($validate)
                return back()->withErrors($validate);

            $image = FileUploadService::uploadFile(
                '/images/profile_photos',
                $request->file('photo')
            );

            Profile::where('user_id', Auth::id())->update(['photo' => $image]);
        }

        Profile::updateInfo(
            Auth::id(),
            $request->site,
            $request->bio,
            $request->phone,
            $request->sex
        );

        return redirect('/profile');
    }

    public function changePassword(ChangePasswordRequest $request): RedirectResponse{
        if (!Hash::check($request->currentPassword, Auth::user()->password))
            return back()->withErrors(['currentPassword' => 'Current password is incorrect']);

        User::updatePassword(Auth::id(), $request->newPassword);
        return redirect('/home');
    }
}
