<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function index()
    {
        // $logs = Activity::orderBy('id','DESC')->paginate(10);
        $logs = DB::table('activity_log')->leftJoin('users', 'causer_id' , '=', 'users.id')->orderBy('activity_log.created_at','DESC')->paginate(10);
        return view('log.index',compact('logs'));
    }
}
