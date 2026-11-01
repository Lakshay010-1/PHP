<?php

namespace App\Http\Controllers;

use App\Models\Control;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    public function getControlDetails()
    {
        $details = Control::first();
        if (!$details) {
            return response([
                "success" => 0,
                "message" => "No Data Found"
            ], 404);
        }

        return response([
            "success" => 1,
            "c_import" => $details->C_Import,
            "c_local" => $details->C_Local
        ], 200);
    }
}
