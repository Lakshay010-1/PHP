<?php

namespace App\Http\Controllers;

use App\Models\PURCHASE;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    //
    public function getTruckNumber(Request $request)
    {
        $party_name = $request->input("party_name", "");
        if ($party_name === "") {
            return response([
                "success" => 0,
                "message" => "Party Name is required",
                "data" => []
            ], 400);
        }
        $party_truck = PURCHASE::where("P_Party_name", $party_name)->where("p_status", 2)->first();
        if (!$party_truck) {
            return response([
                "success" => 0,
                "message" => "Party Truck not found",
                "data" => []
            ], 404);
        }
        return response([
            "success" => 1,
            "message" => "Media fetched successfully",
            "data" => $party_truck->P_TRUCK
        ], 200);
    }

    public function getPartyName()
    {
        $party_names = PURCHASE::select("P_PARTY_NAME")->distinct()->where("P_STATUS", 2)->whereNotNull("P_PARTY_NAME",)->whereRaw("LTRIM(RTRIM(P_PARTY_NAME)) <> ''")->get();
        if (!$party_names) {
            return response([
                "success" => 0,
                "message" => "Record not found",
                "error" => "Record not found"
            ], 404);
        }
        return response([
            "success" => 1,
            "result" => $party_names
        ], 200);
    }
}
