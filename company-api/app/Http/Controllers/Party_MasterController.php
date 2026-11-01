<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Party_MasterController extends Controller
{
    public function getPartyEmail(Request $request)
    {
        $party_name = $request->input("party_name", "");
        $party_name = trim($party_name);
        if (!$party_name) {
            return response([
                "success" => 0,
                "message" => "missing required fields"
            ], 400);
        }
    }
}
