<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Survey;

class DashboardController extends Controller
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
        if ((User::currentUser()->get()->first()->password_changed_at == null)) {
            return redirect(route('password.request'));
         }
         else{
            return view('dashboard', [
                'user' => auth()->user(),
                'users' => User::where('user_id', auth()->user()->id)->count(),
                'surveysTotal' => Survey::join('users', 'surveys.user_id', '=', 'users.id')
                    ->whereNotNull('users.user_id')->count(),
                'surveysNew' => Survey::join('users', 'surveys.user_id', '=', 'users.id')
                ->whereNotNull('users.user_id')->whereNull('surveys.checked_at')->count()
            ]);   
         }
    }
}
