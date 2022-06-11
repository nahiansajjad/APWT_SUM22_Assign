<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $logged_user = $request->session()->get('loggeduser');
        if (isset($logged_user->type) && ($logged_user->type == 'user' || $logged_user->type == 'admin')) {
            return view('dashboard.index')
                ->with('page_title', "Dashboard | User");
        } else {
            return redirect()->route('home.login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home.login');
    }

    public function profile(Request $request)
    {
        $logged_user = $request->session()->get('loggeduser');
        if (isset($logged_user->type)) {
            return view('dashboard.profile')
                ->with('page_title', "Dashboard | Profile");
        } else {
            return redirect()->route('home.login');
        }
    }

    public function userDetails()
    {
        $users = User::all();
        return view('dashboard.userDetails')
            ->with('page_title', "User Details | Page")
            ->with('users', $users);
    }

    public function getUser($id)
    {
        $user = User::where("id", "=", $id)->first();

        if (!$user) {
            return redirect()->route('dashboard.userDetails');
        }

        return view('dashboard.single')
            ->with('page_title', "User Detail | Page")
            ->with('user', $user);
    }
}
