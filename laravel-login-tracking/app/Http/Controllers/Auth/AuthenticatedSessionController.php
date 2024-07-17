<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Login;

class AuthenticatedSessionController extends Controller
{
 
    public function create(): View
    {
        return view('auth.login');
    }

   
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        
        Login::create([
            'user_id' => Auth::id(), 
             'login_at' => now(), 
        ]);

        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
