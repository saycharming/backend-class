<?php

// Pintop training only: add the Route declaration below to the local copy of routes/api.php.
\Illuminate\Support\Facades\Route::get('/classroom/03-routing-middleware-request', function (\Illuminate\Http\Request $request) {
    $name = $request->query('name', 'Pintop student');
    return response()->json(['lesson' => 'Routing, Middleware & Request Flow', 'message' => "Hello, {$name}"]);
});
