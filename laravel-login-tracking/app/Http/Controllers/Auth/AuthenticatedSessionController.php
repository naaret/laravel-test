<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Login; // เพิ่มการนำเข้ารุ่น Login

class AuthenticatedSessionController extends Controller
{
    /**
     * แสดงหน้าเข้าสู่ระบบ.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * จัดการการร้องขอการตรวจสอบสิทธิ์ที่เข้ามา.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // ติดตามการเข้าสู่ระบบ
        Login::create([
            'user_id' => Auth::id(), // เก็บ user_id
            'login_at' => now(), // เก็บเวลาที่เข้าสู่ระบบ
        ]);

        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * ทำลายเซสชันที่ผ่านการตรวจสอบสิทธิ์.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
