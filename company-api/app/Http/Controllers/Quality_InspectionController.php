<?php

namespace App\Http\Controllers;

use App\Models\Quality_Inspection;
use Illuminate\Http\Request;

class Quality_InspectionController extends Controller
{
    //
    public function updateInspectionStatus(Request $request)
    {
        $inspectionNo = $request->input('INSPECTION_NO', '');
        $inspectionStatus = $request->input('INSPECTION_STATUS', '');
        $remark = $request->input('remark', '');

        if ($inspectionNo == '' || $inspectionStatus == '') {
            return response([
                "success" => 0,
                "message" => "Missing required fields"
            ], 400);
        }
        $item = Quality_Inspection::where("INSPECTION_NO", $inspectionNo)->first();

        if (!$item) {
            return response()->json([
                'success' => 0,
                'message' => 'Inspection No. not found'
            ], 404);
        }
        $item->update(["INSPECTION_STATUS" => $inspectionStatus, "remark"=> $remark]);
        $item->save();

        return response([
            "success" => 1,
            "message" => "Inspection updated successfully"
        ], 200);
    }
}
