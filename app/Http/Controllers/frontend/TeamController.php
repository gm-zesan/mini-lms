<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = OurTeam::all();
        return view('frontend.team', compact('teams'));
    }
}
