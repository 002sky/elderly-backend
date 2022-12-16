<?php

namespace App\Http\Controllers;

use App\Models\elderlyProfile;
use App\Models\statusReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class statusReportController extends Controller
{
    public function viewStatusReportStatus()
    {

        $numberOfElderly = elderlyProfile::all()->count();

        $currentMothReport = DB::table('status_reports')->where('writtenTime', '=', Carbon::today()->format('y-m-d'))->get()->count();

        $currentComplete =  $numberOfElderly - $currentMothReport;

        if (!empty($currentComplete)) {
            return response()->json(
                [
                    'success' => true,
                    'totalElderly' => $numberOfElderly,
                    'currentComplete' => $currentMothReport,
                    'imcomplete' => $currentComplete,
                ]

            );
        }
    }


    public function setElderlyStatusReport(Request $request)
    {

        $input = $request->all();

        try {
            $report =  statusReport::created(
                [
                    'report' => $input['report'],
                    'writtenTime' => Carbon::today()->format('y-m-d'),
                    'elderlyID' => $input['elderlyID'],
                ]
            );

            if ($report) {
                return response()->json([
                    'success' => true,
                    'message' => 'created successfully',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'created failed',
                ]);
            }
        } catch (e) {
        }
    }


    public function getIncompleteElderlyStatus()
    {
        $currentMothReport = DB::table('status_reports')->where('writtenTime', '=', Carbon::today()->format('y-m-d'))->get()->count();

        if ($currentMothReport > 0) {

        } else {
            $allElderly = elderlyProfile::all();

            return response()->json(
                $allElderly,
            );
        }
    }
}
