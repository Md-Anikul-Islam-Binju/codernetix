<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamSectionController extends Controller
{
    public function team()
    {
        $team = Team::where('status',1)->get();
        return view('frontend.pages.team.team',compact('team'));
    }
}
