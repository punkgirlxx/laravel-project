<?php
/*  KB - 26-01-2025
    AuthController
    used to controll users access
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
  //opens auth register page
  public function showRegister(){
    return view('auth.register');
	}

  //opens auth login page
	public function showLogin(){
		return view('auth.login');
	}

  //checks the register details before adding user
	public function register(Request $request){
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create($validated);
		Auth::login($user);
		return redirect()->route('dashboard.index');
	}

  //checks the login details, attempts and if fails return to login
  public function login(Request $request){
    $validated = $request->validate([
      'email' => 'required|email',
      'password' => 'required|string',
		]);

    if (Auth::attempt($validated)){
       $request->session()->regenerate();
			 return redirect()->route('dashboard.index');
		}

    throw ValidationException::withMessages([
      'credentials' => 'Sorry, incorrect credentials'
    ]);
	}

  // clears session cookies and return to login
	public function logout(Request $request){
    Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return view('auth.login');
	}

}
