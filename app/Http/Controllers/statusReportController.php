<?php

namespace App\Http\Controllers;

use App\Models\elderlyProfile;
use App\Models\reportStatus;
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
            $report =  statusReport::create(
                [
                    'report' => $input['report'],
                    'writtenTime' => Carbon::today(),
                    'elderlyID' => $input['elderlyID'],
                ]
            );

            if ($report) {
                $reportStatus = reportStatus::where('elderlyID', '=', $input['elderlyID'])->firstOrFail();

                $reportStatus->reportStatus = true;
                $reportStatus->save();
            }

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
        $reportStatus = DB::table('report_statuses')
            ->leftJoin('elderly_profiles', 'report_statuses.elderlyID', '=', 'elderly_profiles.id')
            ->select('elderly_profiles.name', 'elderly_profiles.id', 'report_statuses.reportStatus')
            ->where('report_statuses.reportStatus','!=',1)
            ->get();

        return response()->json(
            $reportStatus,
        );
    }
}
