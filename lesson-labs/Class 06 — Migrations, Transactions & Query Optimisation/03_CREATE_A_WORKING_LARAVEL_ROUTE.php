<?php

// Pintop training only: add the Route declaration below to the local copy of routes/api.php.
\Illuminate\Support\Facades\Route::get('/classroom/06-migrations-transactions-qu', function (\Illuminate\Http\Request $request) {
    $name = $request->query('name', 'Pintop student');
    return response()->json(['lesson' => 'Migrations, Transactions & Query Optimisation', 'message' => "Hello, {$name}"]);
});
