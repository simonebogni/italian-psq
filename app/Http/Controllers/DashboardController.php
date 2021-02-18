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
            $user = auth()->user();
            $role = $user->role;
            $users = 0;
            $patients = 0;
            $surveysTotal = 0;
            $surveysNew = 0;
            if($role == 'A'){
                $users = User::count();
                //questionari utenti
                $surveysTotal = Survey::join('users', 'surveys.user_id', '=', 'users.id')->count();
            }
            if($role == 'P'){
                $patients = User::where('user_id', auth()->user()->id)->count();
                //questionari pazienti
                $surveysTotal = Survey::join('users', 'surveys.user_id', '=', 'users.id')
                    ->where('users.user_id', '=', $user->id)->count();
                $surveysNew = Survey::join('users', 'surveys.user_id', '=', 'users.id')
                    ->where('users.user_id', '=', $user->id)->whereNull('surveys.checked_at')->count();
            }
            if($role == 'U'){
                //questionari utente
                $surveysTotal = Survey::join('users', 'surveys.user_id', '=', 'users.id')
                    ->where('surveys.user_id', '=', $user->id)->count();
            }
            return view('dashboard', [
                'user' => $user,
                'users' => $users,
                'patients' => $patients,
                'surveysTotal' => $surveysTotal,
                'surveysNew' => $surveysNew
            ]);   
         }
    }
}
