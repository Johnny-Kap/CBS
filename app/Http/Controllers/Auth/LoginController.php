<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $login = $request->input('email');
        $user = User::where('email', $login)->orWhere('numero_passport', $login)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Invalid login credentials']);
        }

        $request->validate([
            'password' => 'required|min:8',
        ]);

        if (
            Auth::attempt(['email' => $user->email, 'password' => $request->password]) ||
            Auth::attempt(['numero_passport' => $user->numero_passport, 'password' => $request->password])
        ) {
            Auth::loginUsingId($user->id);
            return $this->redirectTo();
        
        } else {
            return redirect()->back()->withErrors(['password' => 'Invalid login credentials']);
        }
    }

    public function redirectTo()
    {

        // User role
        $role = Auth::user()->role;

        // Check user role
        switch ($role) {
            case 'admin':
                return redirect('/admin/home');
                break;
            case 'user':
                return redirect('/home');
                break;
            default:
                return redirect('/login');
                break;
        }
    }
}
