<?php

// Pintop training only: add the Route declaration below to the local copy of routes/api.php.
\Illuminate\Support\Facades\Route::get('/classroom/05-relational-modelling-norma', function (\Illuminate\Http\Request $request) {
    $name = $request->query('name', 'Pintop student');
    return response()->json(['lesson' => 'Relational Modelling & Normalisation', 'message' => "Hello, {$name}"]);
});
