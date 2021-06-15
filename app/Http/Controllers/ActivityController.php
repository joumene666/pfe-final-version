<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){

        $activities = Activity::where('subject_type', 'App\Models\User')->latest()->get();

        return view('adherent.historique.index', [
            'activities' => $activities
        ]);
    }
    public function indexSt(){

        $activities = Activity::where('subject_type', 'App\Models\Structer')->latest()->get();

        return view('structure.historique.index', [
            'activities' => $activities
        ]);
    }
}
