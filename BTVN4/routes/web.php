<?php
 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\PostController;
 use App\Http\Controllers\HomeController;
 Route::get("/", [PostController::class, "index"]);