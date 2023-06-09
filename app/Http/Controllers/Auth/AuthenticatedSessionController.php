<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        session()->regenerateToken();

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $field = filter_var($request->input('name'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $request->merge([$field => $request->input('name')]);

        if (Auth::attempt($request->only($field, 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            $url = '';
            if($user->role === 'admin') {
                $url = 'admin/dashboard';
            } elseif($user->role === 'user') {
                $url = '/mainpage';
            }

            return redirect()->intended($url);
        }

        throw ValidationException::withMessages([
            'name' => __('auth.failed'),
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
