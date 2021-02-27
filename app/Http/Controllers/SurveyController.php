<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $surveys = compact([]);
        $showDeleteButton = false;
        switch($user->role){
            case 'A':
                $surveys = Survey::orderby('checked_at', 'asc')->orderby('created_at', 'desc')->get();
                $role = 'Admin';
                $showDeleteButton = true;
                break;
            case 'P':
                $surveys = Survey::join('users', 'surveys.user_id', 'users.id')->where('users.user_id', '=', $user->id)->orderby('surveys.checked_at', 'asc')->orderby('surveys.created_at', 'desc')->get();
                $role = 'Pediatrician';
                break;
            case 'U':
            default: 
                $surveys = User::currentUser()->first()->surveys()->orderby('checked_at', 'asc')->orderby('created_at', 'desc')->get();
                $showDeleteButton = true;
                $role = 'User';
                break;
        }
        $totalGroup = count($surveys);
        $perPage = 10;
        $page = Paginator::resolveCurrentPage('page');
        $surveys = new LengthAwarePaginator($surveys->forPage($page, $perPage), $totalGroup, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
        //usort($surveys, function($a, $b) {return strcmp($b->created_at, $a->created_at);});
        return view('surveys.index', [
            'role'=>$role,
            'surveys'=> $surveys,
            'showDeleteButton' => $showDeleteButton
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        if($user->role != 'P'){
            return view('surveys.create', [
                'loggedUser' => $user,
                'questionArray' => Survey::$questionArrayInCouples
            ]);
        }
        abort(401, __("You don't have the right privileges!"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user = auth()->user();
        if($user->role != 'P'){
            $survey = new Survey;
            $survey->user_id = auth()->user()->id;
            $survey->sleep_snore_half = (request('sleep_snore_half') === 'null' ? null : (request('sleep_snore_half') === 'true'));
            $survey->sleep_snore_always = (request('sleep_snore_always') === 'null' ? null : (request('sleep_snore_always') === 'true'));
            $survey->sleep_snore_heavily = (request('sleep_snore_heavily') === 'null' ? null : (request('sleep_snore_heavily') === 'true'));
            $survey->sleep_breath_loudly = (request('sleep_breath_loudly') === 'null' ? null : (request('sleep_breath_loudly') === 'true'));
            $survey->sleep_breath_difficulty = (request('sleep_breath_difficulty') === 'null' ? null : (request('sleep_breath_difficulty') === 'true'));
            $survey->sleep_breath_pause = (request('sleep_breath_pause') === 'null' ? null : (request('sleep_breath_pause') === 'true'));
            $survey->breath_mouth_open = (request('breath_mouth_open') === 'null' ? null : (request('breath_mouth_open') === 'true'));
            $survey->morning_dry_mouth = (request('morning_dry_mouth') === 'null' ? null : (request('morning_dry_mouth') === 'true'));
            $survey->wet_bed = (request('wet_bed') === 'null' ? null : (request('wet_bed') === 'true'));
            $survey->wake_not_rested = (request('wake_not_rested') === 'null' ? null : (request('wake_not_rested') === 'true'));
            $survey->day_drowsiness = (request('day_drowsiness') === 'null' ? null : (request('day_drowsiness') === 'true'));
            $survey->teacher_drowsiness = (request('teacher_drowsiness') === 'null' ? null : (request('teacher_drowsiness') === 'true'));
            $survey->morning_wake_difficulty = (request('morning_wake_difficulty') === 'null' ? null : (request('morning_wake_difficulty') === 'true'));
            $survey->morning_headache = (request('morning_headache') === 'null' ? null : (request('morning_headache') === 'true'));
            $survey->stopped_growing = (request('stopped_growing') === 'null' ? null : (request('stopped_growing') === 'true'));
            $survey->overweight = (request('overweight') === 'null' ? null : (request('overweight') === 'true'));
            $survey->not_listening = (request('not_listening') === 'null' ? null : (request('not_listening') === 'true'));
            $survey->organising_tasks_difficulty = (request('organising_tasks_difficulty') === 'null' ? null : (request('organising_tasks_difficulty') === 'true'));
            $survey->easily_distracted = (request('easily_distracted') === 'null' ? null : (request('easily_distracted') === 'true'));
            $survey->agitate_when_sit = (request('agitate_when_sit') === 'null' ? null : (request('agitate_when_sit') === 'true'));
            $survey->hyperkinetic = (request('hyperkinetic') === 'null' ? null : (request('hyperkinetic') === 'true'));
            $survey->interrupts_others = (request('interrupts_others') === 'null' ? null : (request('interrupts_others') === 'true'));
            $survey->save();
            return redirect(route('surveys'));
        }
        abort(401, __("You don't have the right privileges!"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        dd(["survey"=> $survey,
        "array"=>$survey->toQuestionArray()]);
        //visible only to admins, owner and its pediatrician
        $loggedUser = auth()->user();
        $surveyOwner = $survey->user;
        $authorized = false;
        $showCheckButton = false;
        $showDeleteButton = false;
        switch ($loggedUser->role) {
            case 'A':
                $authorized = true;
                $showCheckButton = true;
                $showDeleteButton = true;
                break;
            case 'P':
                if($loggedUser->id == $surveyOwner->ownPediatrician->id){
                    $authorized = true;
                    if($survey->checked_at == null){
                        $showCheckButton = true;
                    }
                }
                break;
            default:
                if($loggedUser->id == $surveyOwner->id){
                    $authorized = true;
                    $showDeleteButton = true;
                }
                break;
        }
        if($authorized){
            return view('surveys.show', ["survey" =>$survey, "questionArray" => $survey->toQuestionArray(), "showCheckButton" => $showCheckButton, "showDeleteButton"=>$showDeleteButton]);
        }
        abort(401, __("You don't have the right privileges!"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
        $authorized = false;
        $loggedUser = auth()->user();
        switch($loggedUser->role){
            case 'A':
                $authorized = true;
                break;
            case 'U':
                if($survey->user->id == $loggedUser->id){
                    $authorized = true;
                }
                break;
            default:
                break;
        }
        if($authorized){
            $survey->delete();
            return redirect(route('surveys'))->with('success', __('Survey deleted!'));
        }
        return redirect(route('surveys'))->with('fail', __('You don\'t have the right privileges!'));
    }

    public function setChecked(Survey $survey){
        $surveyOwner = $survey->user()->get()->first();
        if(auth()->user()->id == $surveyOwner->user_id){
            $survey->checked_at = Carbon::now();
            $survey->save();
            return redirect()->back()->with('success', __('Survey checked!'));
        }
        return redirect()->back()->with('fail', __('You don\'t have the right privileges!'));
    }
}
