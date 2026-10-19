<?php

// Pintop training only: add the Route declaration below to the local copy of routes/api.php.
\Illuminate\Support\Facades\Route::get('/classroom/10-rate-limiting-performance-', function () {
    return response()->json(['lesson' => 'Rate Limiting & Performance Measurement', 'status' => 'ok']);
})->middleware('throttle:3,1');
