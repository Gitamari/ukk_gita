<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Retrieves the view for the guest login page.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function index()
    {
        return view('guest.login');
    }

    /**
     * Authenticates the user based on the provided credentials and redirects them to the dashboard if successful.
     *
     * @param Request $request The HTTP request object containing the email and password.
     * @return \Illuminate\Http\RedirectResponse Redirects the user to the dashboard if authentication is successful,
     *                                              otherwise redirects back to the login page with an error message.
     */
    public function postlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with('error' , 'Email atau password salah');
    }

    /**
     * Logs out the authenticated user and redirects them to the homepage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
