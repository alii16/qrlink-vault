<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Mengisi data yang tervalidasi
        $user->fill($request->validated());

        // Jika email diubah, set email_verified_at ke null
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Mengelola file foto jika diupload
        if ($request->hasFile('photo')) {
            // Menghapus foto lama jika ada
            if ($user->photo) {
                Storage::delete('public/' . $user->photo);
            }

            // Menyimpan foto baru ke storage
            $path = $request->file('photo')->store('profile_photos', 'public');

            // Menyimpan path foto ke database
            $user->photo = $path;
        }

        // Menyimpan perubahan
        $user->save();

        // Redirect ke halaman profile.edit dengan status
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Logout pengguna
        Auth::logout();

        // Menghapus akun pengguna
        $user->delete();

        // Menghapus sesi dan token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
