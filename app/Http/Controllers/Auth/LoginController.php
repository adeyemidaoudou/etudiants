<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function Login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            if(auth()->user()->type_user == 1){ //il s'agit d'un admin
                return redirect()->intended('/admin/dashboard');
            }

            elseif (auth()->user()->type_user == 2){ // manager
                return redirect()->intended('/agents/dashboard');
            }

            elseif (auth()->user()->type_user == 3){ // promoteurs
                return redirect()->intended('/promoteurs/dashboard');
            }

            elseif (auth()->user()->type_user == 4){ // etudiants
                return redirect()->intended('/etudiants/dashboard');
            }

            elseif (auth()->user()->type_user == 5){ // client
                return redirect()->intended('/home');
            }

        }

        /* else  if (Auth::guard('supermarcheadmin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

             return redirect()->intended('/supermarcheadmin/dashboard');
         }

         else  if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

             return redirect()->intended('/home');
         }*/


        return back()->withInput($request->only('email', 'remember'));
    }




}
