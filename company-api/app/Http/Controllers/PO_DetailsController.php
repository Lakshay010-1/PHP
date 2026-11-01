<?php

namespace App\Http\Controllers;

use App\Models\PO_Details;
use Illuminate\Http\Request;

class PO_DetailsController extends Controller
{
    //
    public function getItemName(Request $request)
    {
        $WBS_PONO = $request->input("WBS_PONO", "");
        if (!$WBS_PONO) {
            return response([
                "success" => 0,
                "message" => "Missing required field(s)"
            ], 400);
        }
        $item_name = PO_Details::select("WBS_MaterialName")->distinct()->where("WBS_PONO", $WBS_PONO)->get();
        if (!$item_name) {
            return response([
                "success" => 0,
                "message" => "No Data Found"

            ], 404);
        }
        return response([
            "success" => 1,
            "message" => "success",
            "result" => $item_name
        ], 200);
    }

    public function getPoNumber(Request $request)
    {
        $party_name = $request->input("party_name", "");
        if ($party_name == "") {
            return response([
                "success" => 0,
                "message" => "Missing required field(s)"
            ], 400);
        }
        $po_numbers = PO_Details::select("WBS_PONO")->whereRaw('LTRIM(RTRIM(WBS_VendorName)) = ?', [trim($party_name)])->whereNotNull("WBS_PONO")->whereRaw("LTRIM(RTRIM(WBS_PONO)) <> ''")->whereRaw('WBS_PoDate >= DATEADD(DAY, -2, GETDATE())')->orderBy("WBS_PONO")->get();
        if (!$po_numbers) {
            return response([
                "success" => 0,
                "message" => "No PO Found For Selected Party",
            ], 404);
        }
        return response([
            "success" => 1,
            "message" => "success",
            "result" => $po_numbers
        ], 200);
    }

    public function getPoDetails(Request $request)
    {
        $WBS_PONO = $request->input("WBS_PONO", "");
        $WBS_MaterialName = $request->input("WBS_MaterialName", "");

        if ($WBS_PONO == "" || $WBS_MaterialName == "") {
            return response([
                "success" => 0,
                "message" => "Missing required field(s)"
            ], 400);
        }

        $details = PO_Details::select("WBS_PQty", "WBS_Rate", "WBS_CuBrPer", "WBS_FeNmAtt")->where("WBS_PONO", $WBS_PONO)->where("WBS_MaterialName", $WBS_MaterialName)->get();
        if (!$details) {
            return response([
                "success" => 0,
                "message" => "Record not found"
            ], 404);
        }
        return response([
            "success" => 1,
            "message" => "success",
            "result" => $details,
        ], 200);
    }
}
