<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
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

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->getId(),
            'address' => 'nullable|string|max:255',
            'balance' => 'nullable|numeric|min:0',
        ]);

        $user->setName($validated['name']);
        $user->setEmail($validated['email']);
        $user->setAddress($validated['address'] ?? '');
        $user->setBalance($validated['balance'] ?? 10000000);
        $user->save();

        return redirect()->route('user.index')->with('success', __('Profile updated successfully!'));
    }

    public function changePassword(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $validated = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->setPassword(bcrypt($validated['password']));
        $user->save();

        return redirect()->route('user.index')->with('success', __('Password updated successfully!'));
    }
}
