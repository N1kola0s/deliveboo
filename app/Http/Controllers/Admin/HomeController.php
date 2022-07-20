<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
#2 Questo va poi aggiunto
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentUser = Auth::id();
        $user = User::where('id', '=', $currentUser)->get();
        return view('admin.home', compact('user'));
    }
}
