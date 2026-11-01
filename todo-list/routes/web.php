<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use League\Uri\Http;

// $items = ["Light", "LCU", "Loki"];

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return "Home Page";
// });

// Route::get("/greetings", function () {
//     return "Greetings to you";
// });

// Route::get("/greet", function () {
//     return view('greet');
//     // return redirect("/greetings");
// });

// Route::get('/greet/{name}', function ($name) {
//     return view('greet', ['name' => $name]);
// });


// Route::get("/tasks", function () use ($items) {
//     return view("tasks", ['list' => $items]);
// });

// Route::get("/tasks/{id}", function ($id) use ($items) {
//     if (count($items) <= $id) {
//         abort(Response::HTTP_NOT_FOUND);
//     }
//     return "Task => " . $items[$id];
// })->name('tasks.show');

// Route::fallback(function () {
//     return "404 Page Not Found";
// });
