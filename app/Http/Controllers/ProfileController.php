<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     */
    public function update(ProfileRequest $request)
    {
        if (auth()->user()->level < 2) {
            return back()->withErrors(['No Autorizado' => 'No puedes cambiar tus datos ni tu password.']);
        }

        auth()->user()->update($request->all());

        return back()->withStatus('Información del usuario actualizados.');
    }

    /**
     * Change the password
     */
    public function password(PasswordRequest $request)
    {
        if (auth()->user()->level < 2) {
            return back()->withErrors(['No Autorizado' => 'No puedes cambiar tus datos ni tu password.']);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus('Password actualizado.');
    }
}
