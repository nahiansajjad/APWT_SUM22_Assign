<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PasswordRule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index')
            ->with('page_title', "Home | Page");
    }

    public function register()
    {
        return view("home.register")
            ->with("page_title", "Register | Page");
    }

    public function registerSubmit(Request $request)
    {
        $request->validate(
            [
                "name" => "required|alpha",
                "email" => "required|email|unique:users,email",
                "pass" => [
                    "required",
                    "min:8",
                    new PasswordRule,
                    "same:cpass"
                ],
                "cpass" => "required|same:pass",
                "type" => [
                    "required",
                    "regex:/^(user|admin)$/i",
                ],
            ],
            [
                "cpass.required" => "The confirm password field is required.",
                "cpass.same" => "The The confirm password and password must match.",
                "pass.same" => "The The confirm password and password must match.",
            ]
        );

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->pass;
        $user->type = $request->type;

        $user->save();

        return redirect()->route('home.index');
    }

    public function login(Request $request)
    {
        $loggeduser = $request->session()->get('loggeduser');

        if ($loggeduser) {
            if ($loggeduser->type === 'user' || $loggeduser->type === 'admin') {
                return redirect()->route('dashboard.index');
            } else {
                return redirect()
                    ->route('home.login')
                    ->withErrors("Invalid credential", 'credential');
            }
        }

        return view("home.login")
            ->with("page_title", "Login | Page");
    }

    public function loginSubmit(Request $request)
    {
        $request->validate(
            [
                "email" => "required",
                "pass" => "required",
            ]
        );

        $user  = User::where('email', "=", $request->email)->where("password", "=", $request->pass)->first();

        if (isset($user->type) && ($user->type == "user" || $user->type == "admin")) {
            $request->session()->put('loggeduser', $user);
            return redirect()->route('dashboard.index');
        } else {
            return redirect()
                ->route('home.login')
                ->withErrors('Invalid Credential', 'credential');
        }

        return $user;
    }
}
