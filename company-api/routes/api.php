<?php

use App\Http\Controllers\ControlController;
use App\Http\Controllers\Party_MasterController;
use App\Http\Controllers\PO_DetailsController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\Quality_Inspection_MediaController;
use App\Http\Controllers\Quality_InspectionController;
use App\Http\Controllers\UserLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get("control/details", [ControlController::class, 'getControlDetails']);

Route::get("truck/number", [PurchaseController::class, 'getTruckNumber']);

Route::post("item/name", [PO_DetailsController::class, 'getItemName']);

Route::post("po/number", [PO_DetailsController::class, 'getPoNumber']);

Route::post("po/details", [PO_DetailsController::class, 'getPoDetails']);

Route::get("party/name", [PurchaseController::class, 'getPartyName']);

Route::get("party/email", [Party_MasterController::class, 'getPartyEmail']);

Route::post("user/login", [UserLoginController::class, "login"]);

Route::get("quality/inspection/details", [Quality_InspectionController::class, 'getQualityInspectionDetails']);

Route::get("inspection/media", [Quality_Inspection_MediaController::class, 'getQualityInspectionMedia']);

Route::get("quality/inspection/media", [Quality_InspectionController::class, 'getQualityInspectionMedia']);

Route::get("quality/inspection/hold", [Quality_InspectionController::class, 'getQualityInspectionHoldData']);

Route::get("quality/inspection/completed", [Quality_InspectionController::class, 'getQualityInspectionCompletedData']);

Route::patch("quality/inspection/status", [Quality_InspectionController::class, 'updateInspectionStatus']);

Route::post("quality/inspection/save", [Quality_InspectionController::class, 'saveQualityInspection']);

Route::post("inspection/save", [Quality_InspectionController::class, 'saveInspection']);

Route::post("unloading/save", [Quality_InspectionController::class, 'saveUnloading']);
