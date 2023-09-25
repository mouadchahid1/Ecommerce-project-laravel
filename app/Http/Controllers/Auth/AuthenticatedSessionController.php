<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate(); 
        // methode pour modifier l url de user par a  son role
        $url = "" ; 
        if ($request->user()->role === "admin") {
            $url = "admin/dashboard" ;
          //  session()->flash("message","log in successfully") ; 
          //  session()->flash("alert-type","info") ;
        } 
        elseif ($request->user()->role === "agent") { 
            $url = "agent/dashboard" ;
        } 
        elseif ($request->user()->role === "user") {
            $url  = "/dashboard" ;
        } 
        else {
            abort(404);
        } 
        

        return redirect()->intended($url);
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
