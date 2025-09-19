<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('User Profile');
        $viewData['user'] = auth()->user();

        return view('user.index')->with('viewData', $viewData);
    }

    public function edit(): View
    {
        $viewData = [];
        $viewData['title'] = __('Edit Profile');
        $viewData['user'] = auth()->user();

        return view('user.edit')->with('viewData', $viewData);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = auth()->user();
        User::validate($request, $user);
       
        $user->setName($request->input('name'));
        $user->setAddress($request->input('address') ?? null);
        $user->save();

        return redirect()->route('user.index')->with('success', __('Profile updated successfully!'));
    }

    public function changePassword(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $validated = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->password = $validated['password'];
        $user->save();

        return redirect()->route('user.index')->with('success', __('Password updated successfully!'));
    }
}
