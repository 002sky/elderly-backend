<?php

namespace App\Http\Controllers;

use App\Models\elderlyProfile;
use App\Models\statusReport;
use Illuminate\Http\Request;

class statusReportController extends Controller
{
    public function viewStatusReportByMonths(Request $request){
        
        $numberOfElderly = elderlyProfile::all()->count();

        $currentMothReport = DB::table('status_reports')->get()->count();


        


    }
}
