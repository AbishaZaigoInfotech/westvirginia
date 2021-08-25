<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use LaraSnap\LaravelAdmin\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //
    public function create()
    {
        return view('auth.passwords.change');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|required|min:6'
        ]);
        $data = $request->all();
        $user = User::find(auth()->user()->id);
        if (!Hash::check($data['old_password'], $user->password)) {
            return back()->with('error', 'The specified password does not match the database password');
        } else {
            $user->password = Hash::make($request->password);
            $user->update();
            return back()->withSuccess('Your password changed successfully');
        }
    }
}
