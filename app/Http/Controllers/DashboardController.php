<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon;
use Carbon\Carbon as CarbonCarbon;

class DashboardController extends Controller
{
    public function index()
    {

        $patient = Patient::all();
        $date = CarbonCarbon::now('+07:00');
        return view('pages.dashboard.indexDashboard', [
            'patient' => $patient,
            'date' => $date->isoFormat('MMMM Do YYYY')
        ]);
    }
}
