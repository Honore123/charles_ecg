<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        return view('settings.change_password');
    }

    public function update(User $user){
        $data = request()->validate([
            'currentPassword' => ['required'],
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required']
        ]);
        if (!Hash::check($data['currentPassword'], $user->password)) {
            return redirect()->back()->with('error', 'Current password incorrect');
        }
        $user->update([
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->back()->with('success', 'Password changed');
    }
}
